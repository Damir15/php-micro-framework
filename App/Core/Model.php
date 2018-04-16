<?php

namespace App\Core;

abstract class Model
{
    const TABLE = '';

    public $id;

    public static function findAll()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }

    public static function findById(int $id)
    {
        $db = Db::instance();
        $res = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id=:id',
            static::class,
            [':id' => $id]
        );

        if (!empty($res)) {
            return $res[0];
        }

        return false;
    }

    public function save()
    {
        if ($this->isNew()) {
            $this->insert();
        }

        $this->update();
    }

    protected function isNew()
    {
        return empty($this->id);
    }

    protected function insert()
    {
        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
        }

        $sql = '
          INSERT INTO ' . static::TABLE . '
          (' . implode(',', $columns) . ')
          VALUES
          (' . implode(',', array_keys($values)) . ')
        ';

        $db = Db::instance();
        $result = $db->execute($sql, $values);

        if (true === $result) {
            $this->id = $db->insert_id();
        }
    }

    protected function update()
    {
        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[$k . ' = :' . $k] = $v;
            $values[':' . $k] = $v;
        }

        $sql = '
            UPDATE ' . static::TABLE . '
            SET ' . implode(', ', array_keys($columns)) . '
            WHERE id = ' . $this->id . '
        ';

        $db = Db::instance();
        $result = $db->execute($sql, $values);

        if (true === $result) {
            $this->id = $db->insert_id();
        }
    }
}