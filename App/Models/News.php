<?php

namespace App\Models;

use App\Core\Model;

class News extends Model
{
    const TABLE = 'news';

    public $title;
    public $description;
}