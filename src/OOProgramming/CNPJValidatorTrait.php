<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\OOProgramming
 */
namespace App\OOProgramming;

/**
 * Trait CNPJValidatorTrait
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
trait CNPJValidatorTrait
{
    /**
     * The check method
     * @param datatype $cpf description
     * @return datatype description
     */
    public function check($cnpj)
    {
        return "Welcome to Tenesse, user: {$cnpj}";
    }

    /**
     * The validate abstract method cria assinatura de método de validação de cpf, para classes que utilizem esse trait.
     * É totalmente possível e permitido a declaração de métodos abstratos em traits.
     * @param string $cpf Cpf do usúario
     * @return string Validate message
     */
    abstract public function validate($cnpj);
}
