<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\DatabasesSQL\Strategy
 */
namespace App\DatabasesSQL\Strategy;

/**
 * abstract class DAStrategy
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
abstract class DBStrategy
{
    abstract protected static function connect();
    abstract protected static function setDBDetails(\StdClass $dbDetails);

    private function __construct()
    {

    }
}
