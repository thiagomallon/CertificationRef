<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\DatabasesSQL\Prototype
 */
namespace App\DatabasesSQL\Prototype;

/**
 * Interface DBPrototype
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
interface DBPrototype
{
    public function __clone();
    public function getPrototype();
}
