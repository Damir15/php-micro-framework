<?php

namespace App\Core;

class Config
{
    use Singleton;

    public $data = [
        'db' => [
            'host' => '127.0.0.1',
            'name' => 'php2',
            'user' => 'root',
            'password' => 'root'
        ]
    ];
}