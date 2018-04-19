<?php

namespace App\Core;

class Container
{
    protected $definitions = [];

    public function set($id, $callback)
    {
        $this->definitions[$id] = $callback;
    }

    public function get($id)
    {
        if (!isset($this->definitions[$id])) {
            throw new \Exception('Undefined component ' . $id);
        }

        return call_user_func($this->definitions[$id], $this);
    }
}