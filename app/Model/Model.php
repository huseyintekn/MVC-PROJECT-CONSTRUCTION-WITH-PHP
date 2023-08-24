<?php

namespace App\Model;

use App\Model\Employee\Employee;
use Database\DB;
use PDO;

/**
 *
 */
class Model extends DB
{
    public $result, $cls;

    public function __construct()
    {
        parent::__construct();
        $this->table = isset($this->table) ? $this->table : get_called_class();
    }

    public function query()
    {
        if (isset($this->fillable) && !empty($this->fillable)) {

            $fillable = join(",", $this->fillable);

            $this->sql = "select $fillable from $this->table";

        } else {

            $this->sql = "select * from $this->table";
        }

        return $this;
    }

    /**
     * @param $condition
     * @return $this
     */
    public function where($field = null, $operator = null)
    {
        if (!is_null($operator) && !is_null($field)) {

            $this->sql .= " where ". $field. " = " . $operator;

        } else {

            $this->sql;

        }

        return $this;
    }

    public function get()
    {
        return $this->pdo->query($this->sql)->fetchAll(PDO::FETCH_OBJ);
    }

    public function first()
    {
        return $this->pdo->query($this->sql)->fetch(PDO::FETCH_OBJ);
    }

    public function with(string $model, $foreginKey, array $columns = [])
    {
        if (!empty($columns)){

            $relatedClassColumns = array_map(function($item){
                return $this->table.'.'.$item;
            }, $columns);

            $modelColumns = array_map(function ($item) use ($model) {
                return $model.".".$item;
            }, $columns);

            $attributes = array_merge($relatedClassColumns, $modelColumns);
            $withColumn = implode(",", $attributes);

            $this->sql = "select $withColumn $this->table";
        }

        $relation = $this->{$model}();

        $this->sql .= " inner join $model on $this->table.$relation[2] = $relation[0].$relation[1]";

        echo $this->sql;die;

    }

    public function hasMany($related, $localKey, $frogeinKey)
    {
        return ["related" =>$related, "localKey" =>$localKey, "frogeinKey"=>$frogeinKey];
    }
}