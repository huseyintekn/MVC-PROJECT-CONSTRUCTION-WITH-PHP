<?php

namespace Database;

use PDO;
use PDOException;

class DB
{
    /**
     * @var PDO
     */
    protected PDO $pdo;

    /**
     * @var string
     */
    protected string $sql;

    public function __construct()
    {
        try {

            $this->pdo = new PDO("mysql:host=127.0.0.1:8852; charset=utf8; dbname=gohub_backend_db", "gohub_backend_user", "gohub_backend_password");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    /**
     * @param $table
     * @return DB
     *
     */
    public function table($table, $field = null, $operator = null)
    {
        $query = "select * from ".$table ." where " . $field. " = " . "'$operator'";

        $result = $this->pdo->query($query)->rowCount();

        return  $result ?? false;
    }


}