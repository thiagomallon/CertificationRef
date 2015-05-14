<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @package App\OOProgramming
 */
namespace App\OOProgramming;

/**
 * Classe OOGrandMa
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class OOGrandMa
{
    protected $name;

    /**
     * Método construtor
     * @return void
     */
    public function __construct()
    {
        $this->name = 'GrandMa class';
    }

    /**
     * Método
     * @return datatype description
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Método
     * @return void description
     * @param datatype $name description
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}