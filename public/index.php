<?php
// Definir la ruta al directorio raíz de la aplicación
define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);
// Asegurarnos de que este archivo no se pueda acceder directamente
defined('ROOTPATH') or header('Location: ../../public/denegado');

// Iniciar la sesión si aún no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si la versión de PHP es compatible
$minPHPVersion = '8.0';
if (version_compare(phpversion(), $minPHPVersion, '<')) {
    die("Your PHP version must be {$minPHPVersion} or higher to run this app. Your current version is " . phpversion());
}



// Cargar las dependencias y la configuración inicial
require_once "../app/core/init.php";

// Mostrar errores solo si DEBUG está habilitado
if (DEBUG) {
    ini_set('display_errors', 1);
} else {
    ini_set('display_errors', 0);
}

// Cargar la aplicación y el controlador
$app = new \App\Core\App();
$app->loadController();
