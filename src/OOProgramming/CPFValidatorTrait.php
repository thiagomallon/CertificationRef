<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\OOProgramming
 */
namespace App\OOProgramming;

/**
 * Trait CPFValidatorTrait
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
trait CPFValidatorTrait
{
    /**
     * The check method
     * @param datatype $cpf description
     * @return datatype description
     */
    public function check($cpf)
    {
        return "Welcome to Alabama, user: {$cpf}";
    }

    /**
     * The validate abstract method cria assinatura de método de validação de cpf, para classes que utilizem esse trait.
     * É totalmente possível e permitido a declaração de métodos abstratos em traits.
     * @param string $cpf Cpf do usúario
     * @return string Validate message
     */
    abstract public function validate($cpf);
}
