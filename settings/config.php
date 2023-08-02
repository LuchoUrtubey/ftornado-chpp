<?php

// Asegurarnos de que este archivo no se pueda acceder directamente
defined('ROOTPATH') or header('Location: ../../public/denegado');

// Define una constante para el protocolo (http o https)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';

// Define el dominio o host actual
$host = $_SERVER['HTTP_HOST'];

// Define el nombre del sitio o dominio principal
$mainDomain = 'ftornado.tk';


// Cargar las variables de entorno desde el archivo .env
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Verifica si el host coincide con el dominio principal
if ($host === $mainDomain) {
    // Define el ROOT para el dominio principal
    define('ROOT', $protocol . $mainDomain);
    // define Database
    define('DBNAME', $_ENV['DB_NAME']);
    define('DBHOST', $_ENV['DB_HOST']);
    define('DBUSER', $_ENV['DB_USER']);
    define('DBPASS', $_ENV['DB_PASS']);
} else {
    // Define el ROOT para otros dominios o entornos de desarrollo
    define('ROOT', $protocol . $host . '/ftornado-chpp/public');
    // define Database
    define('DBNAME', 'tornado');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
}

// Resto del código de la aplicación...
define('APP_NAME', "Federación Tornado | Tornado Cups CHPP");
define('APP_DESCRIPTION', "Manager de competencias y torneos para fútbol online de hattrick.org");

// Muestra los errores en pantalla - TRUE muestra FALSE no muestra-
define('DEBUG', true);

//FECHA
define('ANIO_ACTUAL', date('Y'));


$_SESSION['pageTitle'] = "Federación Tornado";
