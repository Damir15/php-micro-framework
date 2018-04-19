<?php

namespace App\Models;

use App\Core\Model;

class News extends Model
{
    const TABLE = 'news';

    public $title;
    public $description;
    public $author_id;

    /**
     * LAZY LOAD
     *
     * @param $name
     * @return bool|null
     */
    public function __get($name)
    {
        switch ($name) {
            case 'author':
                return Author::findById($this->author_id);
                break;
            default:
                return null;
        }
    }

    public function __isset($name)
    {
        switch ($name) {
            case 'author':
                return !empty($this->author_id);
                break;
            default:
                return false;
        }
    }
}