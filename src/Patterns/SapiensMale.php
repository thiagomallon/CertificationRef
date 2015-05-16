<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @package App\Patterns
 */
namespace App\Patterns;

/**
 * Classe SapiensMale
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class SapiensMale extends SapiensAbstract
{
    /**
     * Método seta propriedade gender
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
