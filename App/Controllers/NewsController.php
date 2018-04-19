<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\News as NewsModel;

class NewsController extends Controller
{
    public function index()
    {
        $news = NewsModel::findAll();
        $this->view->display('pages.news', compact('news'));
    }

    public function new($id)
    {
        echo $id;
    }
}