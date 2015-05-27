<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\OOProgramming
 */
namespace App\OOProgramming;

/**
 * Classe GrandMa
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class GrandMa
{
    /**
     * Propriedade armazena nome
     * @var string $name
     */
    protected $name;

    /**
     * Método construtor
     * @return null
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
     * @return null description
     * @param datatype $name description
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Método
     * @return datatype description
     */
    public static function getCpf()
    {
        return self::$cpf;
    }

    /**
     * Método estático retorna string
     * @return string
     */
    public static function sayHello()
    {
        return 'Hello, how are you, son?!';
    }
}
