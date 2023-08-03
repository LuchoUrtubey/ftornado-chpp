<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\MainController;

// Asegurarnos de que este archivo no se pueda acceder directamente
defined('ROOTPATH') or header('Location: ../../public/denegado');

class Inicio
{
    use MainController;

    public function index(): void
    {
        $this->view('inicio');

        // Verificar si el usuario ya ha iniciado sesión
        if (isset($_SESSION['activo']) && $_SESSION['activo'] === '1') {
            // Si el usuario ya ha iniciado sesión, redireccionar a la página principal (principal.php)
            header("Location: principal");
            exit();
        }
    }
}
