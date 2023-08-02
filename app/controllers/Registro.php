<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\MainController;
use PDO;
use \PDOException;

// Asegurarnos de que este archivo no se pueda acceder directamente
defined('ROOTPATH') or header('Location: ../../public/denegado');

class Registro
{
    use MainController;

    public function index(): void
    {
        $this->view('registro');
    }
}

// Función para limpiar y validar los datos ingresados por el usuario
function limpiarDatos($dato)
{
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

if (isset($_POST['registroTornado'])) {
    $mail = $_POST['mailTornado'] ?? '';
    $usuario = $_POST['userTornado'] ?? '';
    $contraseña = $_POST['passTornado'] ?? '';

    // Limpiar y validar los datos ingresados
    $mail = limpiarDatos($mail);
    $usuario = limpiarDatos($usuario);
    $contraseña = limpiarDatos($contraseña);

    // Validar que los campos no estén vacíos
    if (empty($mail) || empty($usuario) || empty($contraseña)) {
        $error = "Por favor, completa todos los campos";
    } else {
        // Realizar la conexión a la base de datos utilizando PDO
        include_once "../../settings/config.php";
        try {
            $pdo = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Consultar si el correo o usuario ya existen en la base de datos
            $sql = "SELECT mailTornado, userTornado FROM miembros WHERE mailTornado = :mail OR userTornado = :usuario LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                if ($row['mailTornado'] === $mail) {
                    $error = "El correo ya está registrado";
                } elseif ($row['userTornado'] === $usuario) {
                    $error = "El usuario ya está registrado";
                }
            } else {
                // Generar el hash de la contraseña utilizando la función password_hash
                $hashedPassword = password_hash($contraseña, PASSWORD_DEFAULT);

                // Insertar el nuevo usuario en la base de datos
                $sql = "INSERT INTO miembros (mailTornado, userTornado, passTornado) VALUES (:mail, :usuario, :hashedPassword)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':mail', $mail);
                $stmt->bindParam(':usuario', $usuario);
                $stmt->bindParam(':hashedPassword', $hashedPassword);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $_SESSION['registroExitoso'] = true;
                    header("Location: login");
                    exit();
                } else {
                    $error = "Error al registrar el usuario";
                }
            }
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
