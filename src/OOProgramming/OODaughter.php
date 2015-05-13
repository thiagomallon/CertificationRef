<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @package App\OOPrograming
 */
namespace App\OOProgramming;

/**
 * Classe implementa herança - Métodos, propriedade e herança são testados
 * em classe de teste.
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class OODaughter extends OOMother
{

    /**
     * Propriedade armazena nome
     * @var string
     */
    protected $name;

    /**
     * Método construtor da classe. O método chama método construtor da classe mãe.
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->name .= 'DaughterClass!';
    }

    /**
     * Método atribui valor de dado recebido à propriedade $name
     * @return void
     * @param string $name É esperado dado do tipo string
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Método retorna valor da propriedade $name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Método retorna instância estática da classe
     * @return object
     */
    public function getInstance()
    {
        return new static(); // retorna instância estática do objeto
    }


    /**
     * Método retorna array de argumentos passado ao mesmo.
     * A função func_get_args() retorna array de argumentos passados ao método.
     * Sabe-se que métodos do PHP não possuem valor máximo de argumentos a serem
     * recebidos, somente valor mínimo, que no caso desse método, não se aplica,
     * ele não espera parâmetro algum, apesar de poder receber quantos forem.
     * @return array
     * @param mixed O método espera receber quantos parâmetros
     */
    public function returnArgsPassed()
    {
        return func_get_args();
    }

    /**
     * Método retorna array de propriedades do objeto. A função get_object_vars,
     * consegue retornar um array com todas as propriedades do objeto e seus
     * respectivos valores, independentemente do modificar de acesso atribuído
     * às mesmas.
     * @return array
     */
    public function returnObjVars()
    {
        return get_object_vars($this);
    }

    /**
     * Método retorna chamada ao método getName, que por sua vez retorna valor da propriedade
     * $name
     * @return string Valor retornado da chamada ao método getName da classe OOGrandMa
     * construtor da classe
     */
    public function getGrandMaName()
    {
        // OOGrandMa::__construct(); // para que a função getName, retorne o valor da propriedade, na classe OOGrandMa
        return OOGrandMa::getName();
    }

    /**
     * Método retorna chamada ao método getName da classe mãe OOMother
     * @return string Valor retornado da chamada ao método getName da classe OOMother
     */
    public function getMomName()
    {
        OOMother::__construct();
        return OOMother::getName();
    }
}
