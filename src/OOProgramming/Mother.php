<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\OOPrograming
 */
namespace App\OOProgramming;

/**
 * Classe implementa herança - Métodos, propriedade e herança são testados
 * em classe de teste.
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class Mother extends GrandMa
{
    /**
     * Propriedade armazena nome
     * @var string
     */
    protected $name;

    /**
     * Método construtor da classe
     * @return null
     */
    public function __construct()
    {
        $this->name = 'MotherClass!';
    }

    /**
     * Método retorna valor da propriedade $name do objeto
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Método atribui valor à propriedade $name do objeto
     * @return null
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Método retorna instância estática do objeto
     * @return object
     */
    public function getInstance()
    {
        return new static(); // retorna instância estática do objeto
    }

    /**
     * Método retorna array com propriedade(s) do objeto - identificador e valor,
     * independentemente do encapsulamento atribuído.
     * @return array
     */
    public function returnObjVars()
    {
        return get_object_vars($this);
    }

    /**
     * Método retorna array de argumentos passados ao mesmo
     * @return array
     */
    public function returnArgsPassed()
    {
        return func_get_args();
    }
}
