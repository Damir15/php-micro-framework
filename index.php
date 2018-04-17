<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require __DIR__ . '/autoload.php';

$view = new \App\Core\View();
$users = \App\Models\User::findAll();
$view->display('pages.index', compact('users'));