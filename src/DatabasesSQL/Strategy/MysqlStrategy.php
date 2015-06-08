<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\DatabasesSQL\Strategy
 */
namespace App\DatabasesSQL\Strategy;

use App\DatabasesSQL\Prototype\DBPrototype;
use App\WebFeatures\ConfigsXMLReader;

/**
 * Class MysqlStrategy
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class MysqlStrategy extends DBStrategy implements DBPrototype
{
    protected static $daDetails;
    protected static $dbh;

    protected static function connect()
    {
        if (!self::$dbh) {
            /* Abaixo dependência não injetada, por questão de arquitetura do negócio,n
             * não se faz conveniente implementação de injeção da mesma. */
            $configsXML = new ConfigsXMLReader();
            self::$daDetails = $configsXML->getDatabaseCredentials('mysql');

            self::$dbh = new \PDO('mysql:host='.self::$daDetails->host.
                ';dbname='.self::$daDetails->name, self::$daDetails->user, self::$daDetails->pass);
            //print_r(self::$daDetails);
        }
    }

    protected static function setDBDetails(\StdClass $dbDetails)
    {

    }

    public function getPrototype()
    {

    }

    public function __clone()
    {

    }
}
