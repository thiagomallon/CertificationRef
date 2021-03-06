<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\OOProgramming
 */
namespace App\OOProgramming;

/**
 * Classe ClosuresToBind, usada para testar métodos bindTo e bind da classe do Closure do PHP.
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class ClosuresToBind
{
    /**
     * Propriedade
     * @var datatype $property1 description
     */
    protected $property1;

    /**
     * Método retorna propriedade property1
     * @return callable
     * Método retorna propriedade property1
     */
    public function getProperty1()
    {
        return $this->property1;
    }
}
