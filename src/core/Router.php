<?php

namespace App\Core;

use App\Core\Request;

class Router
{
    private $routes = [];
    protected $middlewares = [];

    public function add($pattern, $controller, $method, $middlewares = [])
    {
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        
        $this->routes[$pattern] = [
            'controller' => $controller,
            'method' => $method
        ];

        $this->middlewares[$pattern] = $middlewares;
    }

    public function dispatch($uri)
    {
        $middlewares = [];

        foreach ($this->middlewares as $pattern => $middlewareClasses) {
            if (preg_match($pattern, $uri)) {
                $middlewares = $middlewareClasses;
                break;
            }
        }

        foreach ($middlewares as $middlewareClass) {
            $middleware = new $middlewareClass();
            $next = function ($request) {
                return true;
            };
            if (!$middleware->handle(new Request(), $next)) {
                header('Location: /login');
                return;
            }
        }

        foreach ($this->routes as $pattern => $route) {
            if (preg_match($pattern, $uri, $matches)) {
                $controllerName = $route['controller'];
                $methodName = $route['method'];
                $controllerCompleteName = "App\\Controllers\\" . $controllerName;

                $controller = new $controllerCompleteName();
                $controller->$methodName(...$matches); 

                return;
            }
        }

        echo "404 Not Found";
    }
}
