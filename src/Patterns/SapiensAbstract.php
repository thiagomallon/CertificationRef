<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @package App\Patterns
 */
namespace App\Patterns;

/**
 * Interface SapiensAbstract
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
abstract class SapiensAbstract
{
    /**
     * Propriedade
     * @var string $fullName
     */
    protected $fullName;
    /**
     * Propriedade armazena gênero do sapiens
     * @var string $gender
     */
    protected $gender;
    /**
     * Propriedade armazena passos do sapiens
     * @var int $steps
     */
    protected $steps;

    /**
     * Método abstrato, seta propriedade $gender
     * @return void
     */
    abstract public function setGender($gender);
    /**
     * Método abstrato, retorna gênero
     * @return string
     */
    abstract public function getGender();


    /**
     * Método implementa movimentação ao sapiens
     * @return void
     * @param int $steps
     */
    public function walk($steps)
    {
        $this->steps = $steps;
    }
}
