<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\OOProgramming
 */
namespace App\OOProgramming;

/**
 * Classe StaticStuffDaughter
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class StaticStuffDaughter extends StaticStuffMother
{
    /**
     * Método estático
     * @return datatype description
     *
     */
    public static function getStaticProp()
    {
        return self::$staticProp = 'Daughter scope';
    }

    /**
     * Método estático
     * @return datatype description
     */
    public static function seeNeverYours()
    {
        return 'Daughter scope, son';
    }

    /**
     * Método estático
     * @return datatype description
     */
    public static function getCouldBeYours()
    {
        return 'Yet Daughter scope, son';
    }
}
