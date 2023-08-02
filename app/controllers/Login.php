<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\MainController;

// Asegurarnos de que este archivo no se pueda acceder directamente
defined('ROOTPATH') or header('Location: ../../public/denegado');

class Login
{
    use MainController;

    public function index(): void
    {
        $this->view('login');

        // Verificar si el usuario ya ha iniciado sesión
        if (isset($_SESSION['activo']) && $_SESSION['activo'] === '1') {
            // Si el usuario ya ha iniciado sesión, redireccionar a la página principal (principal.php)
            header("Location: principal");
            exit();
        }
        // Incluir el archivo que contiene la función realizarInicioSesion()
        include_once "../settings/accesoTornado.php";
        // Verificar si se ha enviado el formulario de inicio de sesión (loginTornado)
        if (isset($_POST['loginTornado'])) {
            // Obtener el nombre de usuario y contraseña enviados en el formulario
            $user = $_POST['userTornado'] ?? '';
            $pass = $_POST['passTornado'] ?? '';
            // Llamar a la función realizarInicioSesion() para verificar las credenciales
            // Esta función está en el archivo "accesoTornado.php"
            $error = realizarInicioSesion($user, $pass);
        }
    }
}
