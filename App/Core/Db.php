<?php

namespace App\Core;

use \App\Core\Config;

class Db
{
    use Singleton;

    protected $dbh;

    protected function __construct()
    {
        $config = Config::instance();

        $this->dbh = new \PDO(
            'mysql:host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['name'],
            $config->data['db']['user'],
            $config->data['db']['password']
        );
    }

    /**
     * Выполняет запрос в базу, используется
     * для запросов которые ничего не возвращают из базы.
     *
     * @param $sql - string
     * @return bool
     */
    public function execute($sql, $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        return $res;
    }

    /**
     * Выполняет запрос в базу, используется для тех запросов
     * которые будут возвращать данные.
     *
     * @param $sql
     * @return array
     */
    public function query($sql, $class = 'stdClass', $data = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        if (false !== $res) {
            return $sth->fetchAll(
                \PDO::FETCH_CLASS,
                $class
            );
        }
        return [];
    }

    public function insert_id()
    {
        return $this->dbh->lastInsertId();
    }
}