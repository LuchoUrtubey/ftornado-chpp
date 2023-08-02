<?php

declare(strict_types=1);

namespace App\Core;

trait MainController
{
    public function view(string $name, array $data = []): void
    {
        // Extracción de datos para pasarlos a la vista
        if (!empty($data)) {
            extract($data);
        }

        // Selecciona la vista
        $filename = "../app/views/pages/" . $name . ".view.php";

        if (file_exists($filename)) {
            require_once $filename;
        } else {
            $filename = "../app/views/pages/404.view.php";
            require_once $filename;
        }
    }
}
