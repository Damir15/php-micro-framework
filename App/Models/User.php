<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    const TABLE = 'users';

    public $email;
    public $name;
}