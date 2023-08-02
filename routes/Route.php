<?php

namespace App\Routes; // Declarar el namespace para la clase Route

class Route
{
    private static $routes = [];

    public static function get(string $uri, $callback)
    {
        $uri = trim($uri, "/");
        self::$routes['GET'][$uri] = $callback;
    }

    public static function post(string $uri, $callback)
    {
        $uri = trim($uri, "/");
        self::$routes['POST'][$uri] = $callback;
    }

    public static function dispatch()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, "/");
        $uri = filter_var($uri, FILTER_SANITIZE_URL); // Sanitizar la URI

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes[$method] as $route => $callback) {
            if (strpos($route, ":") !== false) {
                $route = preg_replace('#:[a-zA-Z]+#', '([a-zA-Z0-9]+)', $route);
            }

            if (preg_match("#^$route$#", $uri, $matches)) {
                $params = array_slice($matches, 1);

                if (is_callable($callback)) {
                    $response = $callback(...$params);
                } elseif (is_array($callback)) {
                    // Obtener el controlador y el método de la callback
                    $controllerName = $callback[0];
                    $methodName = $callback[1];

                    // Verificar si el controlador y el método existen
                    if (class_exists($controllerName) && method_exists($controllerName, $methodName)) {
                        // Instanciar el controlador y llamar al método
                        $controllerInstance = new $controllerName();
                        $response = $controllerInstance->$methodName(...$params);
                    } else {
                        // Si el controlador o el método no existen, lanzar un error o redirigir a una página de error
                        http_response_code(404);
                        echo '404 Not Found';
                        return;
                    }
                } else {
                    // Si el callback no es válido, lanzar un error o redirigir a una página de error
                    http_response_code(404);
                    echo '404 Not Found';
                    return;
                }

                // Enviar la respuesta
                if (is_array($response) || is_object($response)) {
                    header('Content-Type: application/json');
                    echo json_encode($response, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
                } else {
                    echo htmlspecialchars($response, ENT_QUOTES, 'UTF-8');
                }

                return;
            }
        }

        // Si no se encontró la ruta, mostrar una página de error 404
        http_response_code(404);
        echo '404 Not Found';
    }
}
