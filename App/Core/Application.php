<?php

namespace App\Core;

use App\Controllers\NewsController;
use App\Core\Container;

class Application
{
    public static function run()
    {
        $container = new Container();

        echo '<pre>';
        $res = Route::do();
        var_dump($res);

        $container->set('view', function (Container $container) {
            return new View();
        });

        $controller = new NewsController(
            $container->get('view')
        );
        $controller->index();
    }
}