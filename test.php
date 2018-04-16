<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require __DIR__ . '/autoload.php';

$sig = App\Core\Singleton::instance();
$sig->counter = 1;
var_dump($sig);