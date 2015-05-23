<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @package App\DatabasesSQL
 */
namespace App\DatabasesSQL;

use App\WebFeatures\XMLReader;

/**
 * Interface DBAdapter
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
interface DBAdapter
{
    /**
     * The getInstance abstract method
     * @return datatype description
     */
    public static function connect(XMLReader $dbConfig);
    /**
     * The setDBConfigs abstract method
     * @return datatype description
     */
    public function setDBConfigs();
}
