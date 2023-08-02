<?php
function realizarInicioSesion($user, $pass)
{
    include_once "config.php";

    try {
        $conexion = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);

        // Validar y limpiar los datos ingresados por el usuario
        $userClean = htmlspecialchars($user);
        $passClean = htmlspecialchars($pass);

        // Validar que los campos no estén vacíos
        if (empty($userClean) || empty($passClean)) {
            $error = "<div class='alert alert-danger' role='alert'>Debes ingresar un usuario y una contraseña válidos</div>";
            return $error;
        }

        // Consulta preparada para evitar la inyección SQL
        $sql = "SELECT idTornado, userTornado, passTornado FROM miembros WHERE userTornado = :user LIMIT 1";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':user', $userClean);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $storedPass = $row['passTornado'];

            // Verificar la contraseña utilizando password_verify
            if (password_verify($passClean, $storedPass)) {
                $_SESSION['idTornado'] = $row['idTornado'];
                $_SESSION['userTornado'] = $row['userTornado'];
                $_SESSION['activo'] = '1';
                header("Location: principal");
                exit();
            } else {
                $error = "Credenciales inválidas";
            }
        } else {
            $error = "Credenciales inválidas";
        }

        $conexion = null; // Cerrar la conexión
        return $error;
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}
