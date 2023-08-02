<?php

// Asegurarnos de que este archivo no se pueda acceder directamente
defined('ROOTPATH') or exit('Access Denied!');

// Autoloader para cargar las clases automáticamente
// spl_autoload_register(function ($classname) {
//     $classname = explode("\\", $classname);
//     $classname = end($classname);
//     require $filename = "../app/models/" . ucfirst($classname) . ".php";
// });

// Requerir el archivo de configuración
require '../settings/config.php';

// Requerir el archivo que contiene las funciones
require 'functions.php';

// Requerir el archivo que contiene la clase Database
require 'Database.php';

// Requerir el archivo que contiene la clase Model
require 'Modeldb.php';

// Requerir el archivo que contiene el trait MainController
require 'Controller.php';

// Requerir el archivo que contiene la clase App
require 'App.php';

// Requerir el archivo de errores
require '../settings/error.php';



// Requerir el archivo de conección
// require '/../models/Connect.php';
