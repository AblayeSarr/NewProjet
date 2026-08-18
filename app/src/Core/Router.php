<?php

namespace App\Core;

require_once "../app/src/Controllers/EleveController.php";

class Router
{
    private array $routes = [];

    public function __construct()
    {
        $this->routes = [
            '/' => [
                'controller' => 'App\Controllers\EleveController',
                'action' => 'index'
            ],

            '/eleves' => [
                'controller' => 'App\Controllers\EleveController',
                'action' => 'index'
            ]
        ];
    }

    public function redirection(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (!isset($this->routes[$uri])) {
            http_response_code(404);
            echo "Page introuvable";
            return;
        }

        $controllerClass = $this->routes[$uri]['controller'];
        $action = $this->routes[$uri]['action'];

        if (!class_exists($controllerClass)) {
            http_response_code(404);
            echo "Contrôleur introuvable : $controllerClass";
            return;
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $action)) {
            http_response_code(500);
            echo "Méthode introuvable : $action";
            return;
        }

        $controller->$action();
    }
}