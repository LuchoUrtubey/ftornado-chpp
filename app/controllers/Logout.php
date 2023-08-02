<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\MainController;

// Asegurarnos de que este archivo no se pueda acceder directamente
defined('ROOTPATH') or header('Location: ../../public/denegado');

class Logout
{
    use MainController;

    public function index(): void
    {
        $this->view('logout');
    }

    public function doLogout(): void
    {
        // Verificar si el usuario ha iniciado sesión
        if (!isset($_SESSION['activo']) || $_SESSION['activo'] !== '1') {
            header("Location: " . ROOT . "/principal");
            exit();
        }

        // Cerrar sesión y destruir todas las variables de sesión
        session_unset();
        session_destroy();

        // Redirigir al inicio de sesión
        header("Location: " . ROOT . "/inicio");
        exit();
    }
}
