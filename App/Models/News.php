<?php

namespace App\Models;

use App\Core\Model;

class News extends Model
{
    const TABLE = 'news';

    public $title;
    public $description;
    public $author_id;

    public static function findAll()
    {
        $news = parent::findAll();
        foreach ($news as $new) {
            $new->author = Author::findById($new->author_id);
        }

        return $news;
    }
}