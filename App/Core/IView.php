<?php

namespace App\Core;

interface IView
{
    public function display($template, $data = []);
}