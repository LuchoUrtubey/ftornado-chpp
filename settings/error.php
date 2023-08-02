<?php
// Asegurarnos de que este archivo no se pueda acceder directamente
defined('ROOTPATH') or header('Location: ../../public/denegado');
// ESTABLECER LA CONFIGURACIÓN DE MANEJO DE ERRORES
// Reportar todos los errores
error_reporting(E_ALL);
// Ignorar errores repetidos
ini_set('ignore_repeated_errors', TRUE);
// No mostrar errores en pantalla
ini_set('display_errors', 0);
// Habilitar el registro de errores en el archivo de registro 
ini_set('log_errors', TRUE);

// RUTA DEL ARCHIVO DE REGISTRO DE ERRORES
// __dir__ contiene la ruta absoluta del directorio actual
ini_set('error_log', __DIR__ . '/php-error.log');

// Registro del mensaje de inicio de la aplicación
error_log("Inicio de aplicación");
