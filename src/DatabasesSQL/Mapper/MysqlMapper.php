<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\DatabasesSQL\Mapper
 */
namespace App\DatabasesSQL\Mapper;

use App\DatabasesSQL\Strategy\MysqlStrategy;

/**
 * Abstract Class MysqlMapper
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
abstract class MysqlMapper extends MysqlStrategy implements DBMapper
{
    protected $table;

    public function fetchAll(array $columns = array(), array $where = array(), $order = null, $limit = null)
    {
        self::connect();
        $statement = 'SELECT ';
        $statement .= $this->treatArrayColumns($columns);
        $statement .= ' FROM '.$this->table;
        
        $stmt = self::$dbh->prepare($statement);
        $stmt->setFetchMode(\PDO::FETCH_OBJ);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        self::connect();
    }

    public function insert(array $columns = array(), array $values = null)
    {
        self::connect();
    }

    public function update(array $where = null)
    {
        self::connect();
    }

    public function delete(array $where = null)
    {
        self::connect();
    }

    private function treatArrayColumns(array $columns)
    {
        if (count($columns)) {
            return implode(',', $columns);
        } else {
            return '*';
        }
    }

    private function treatArrayWhere(array $where)
    {

    }
}
