<?php

namespace App\Core;

abstract class Controller
{
    protected $view;

    public function __construct(IView $view)
    {
        $this->view = $view;
    }

    protected function beforeAction()
    {

    }
}