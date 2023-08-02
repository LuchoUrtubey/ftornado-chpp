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
    }
}
