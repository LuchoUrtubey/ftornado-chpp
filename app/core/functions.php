<?php
// Función para mostrar mejor visualmente los datos
function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "<pre>";
}

// Función para escapar caracteres especiales y prevenir ataques XSS
function escape_html($string)
{
    return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

// Función para obtener la fecha actual
function year()
{
    //FECHA
    $anioActual = date('Y');
    echo $anioActual;
}
