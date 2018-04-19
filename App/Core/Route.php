<?php

namespace App\Core;

class Route
{
    public static function do()
    {
        $dataRounts = self::routes();
        $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
        $requestUrl = ltrim($_SERVER['REQUEST_URI'], '/php2');
        $requestUrlParams = explode('/', $requestUrl);

        $routes = $dataRounts[$requestMethod];

        if (!empty($routes[$requestUrl])) {
            return $routes[$requestUrl];
        }

        foreach ($routes as $keyUrl => $controllerAndAction) {
            $routeParams = explode('/', $keyUrl);
        }
    }

    public static function routes()
    {
        return require __DIR__ . '/../Config/routes.php';
    }
}