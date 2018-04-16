<?php

require __DIR__ . '/autoload.php';

if (!empty($_GET['id'])) {

    $new = \App\Models\News::findById($_GET['id']);
    echo $new->title . '<br>';
    echo $new->description . '<br>';
    echo '<a href="http://localhost/php2/test.php">Вернуться назад</a>';
}