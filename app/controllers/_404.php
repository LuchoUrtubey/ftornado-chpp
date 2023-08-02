<?php

// Declaración estricta de tipos para asegurar un código más seguro y predecible
declare(strict_types=1);

// Definición del espacio de nombres para evitar conflictos de nombres de clases
namespace App\Controllers;

// Importamos el trait MainController para usar su funcionalidad
use App\Core\MainController;

// Asegurarnos de que este archivo no se pueda acceder directamente
defined('ROOTPATH') or header('Location: ../../public/denegado');

// Definición de la clase _404 que representa el controlador para la página de error 404
class _404  // El nombre debe tener el mismo que el archivo y debe empezar con mayúscula o _
{
    // Usamos el trait MainController para reutilizar su funcionalidad en esta clase
    use MainController;

    // Método index que representa la acción principal del controlador
    public function index(): void
    {
        // Invocamos el método view del trait MainController para cargar la vista '404'
        $this->view('404');  // Esto significa que en la URl ponemos /404 y muestra la página
    }
}
