<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @package App\DesignPatterns
 */
namespace App\DesignPatterns;

/**
 * Classe Survive
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class MammalSurvive
{
    /**
     * Propriedade armazena dados recebidos no método eatingFood
     * @var datatype $stomach description
     */
    protected $stomach = [];

    /**
     * Método recebe $food, para a sobrevivência do mammal
     * @return void
     * @param mixed $food Argumento de valor variádo, mammal come quase tudo =)
     */
    public function hunt($food)
    {
        $this->stomach[] = $food; // coloca food no stomach
    }
}
