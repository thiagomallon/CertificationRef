<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @package App\DatabasesSQL
 */
namespace App\DatabasesSQL;

/**
 * Interface DBAdapter
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
abstract class DB
{
    /**
     * The getInstance abstract method
     * @return datatype description
     */
    abstract public static function connect(\SimpleXMLElement $dbConfig);
    /**
     * The setDBConfigs abstract method
     * @return datatype description
     */
    abstract protected static function setDBConfigs();
    /**
     * The fetchAll abstract method
     * @return datatype description
     * @param datatype $where description
     */
    abstract protected function fetchAll($statement, $args);
    /**
     * The fetchRow abstract method
     * @return datatype description
     * @param datatype $where description
     */
    abstract public static function fetchRow($where, $order);
    /**
     * The __construct abstract method
     * @return datatype description
     *
     */
    abstract protected function __clone();
    /**
     * The __ abstract method
     * @return datatype description
     */
    abstract protected function __wakeup();
}
