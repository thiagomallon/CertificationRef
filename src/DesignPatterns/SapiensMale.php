<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @package App\DesignPatterns
 */
namespace App\DesignPatterns;

/**
 * Classe SapiensMale
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class SapiensMale extends SapiensAbstract
{
    /**
     * Método seta propriedade gender
     * @param string $gender
     * @return void
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * Método retorna propriedade gender
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }
}
