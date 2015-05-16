<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @package App\DatabasesSql
 */
namespace App\DatabasesSql;

/**
 * Classe SingWithTongue
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
final class SingWithTongue
{
    private $dbName = null;
    private $dbHost = null;
    private $dbPass = null;
    private $dbUser = null;

    private static $instance = null;

    private function __construct($dbDetails = array())
    {
        // Please note that this is Private Constructor
        $this->dbName = $dbDetails['db_name'];
        $this->dbHost = $dbDetails['db_host'];
        $this->dbUser = $dbDetails['db_user'];
        $this->dbPass = $dbDetails['db_pass'];

        // Your Code here to connect to database //
        $this->dbh = new PDO('mysql:host='.$this->dbHost.';dbname='.$this->dbName, $this->dbUser, $this->dbPass);
    }

    public static function connect($dbDetails = array())
    {
        // Check if instance is already exists
        if (self::$instance == null) {
            self::$instance = new database($dbDetails);
        }

        return self::$instance;

    }

    private function __clone()
    {
        // Stopping Clonning of Object
    }

    private function __wakeup()
    {
        // Stopping unserialize of object
    }
}
