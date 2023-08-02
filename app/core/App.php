<?php

declare(strict_types=1);

namespace App\Core;

class App
{
    private string $controller = 'Inicio';
    private string $method = 'index';

    // Constructor
    public function __construct()
    {
        $this->loadController();
    }

    private function splitURL(): array
    {
        $URL = $_GET['url'] ?? 'inicio';

        $URL = explode("/", trim($URL, "/"));
        return $URL;
    }

    public function loadController(): void
    {
        $URL = $this->splitURL();

        // Selecciona el controlador
        $filename = "../app/controllers/" . ucfirst($URL[0]) . ".php";

        if (file_exists($filename)) {
            $controllerClass = '\\App\\Controllers\\' . ucfirst($URL[0]);
            require_once $filename;
            $this->controller = $controllerClass;
            unset($URL[0]);
        } else {
            $filename = "../app/controllers/_404.php";
            require_once $filename;
            $this->controller = '\\App\\Controllers\\_404';
        }

        $controller = new $this->controller;

        // Selecciona el método
        if (!empty($URL[1])) {
            $method = $URL[1];
            if (method_exists($controller, $method)) {
                $this->method = $method;
                unset($URL[1]);
            }
        }

        // Llama al método con los parámetros de la URL
        call_user_func_array([$controller, $this->method], $URL);
    }
}
