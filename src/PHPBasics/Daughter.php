<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\PHPBasics
 */
namespace App\PHPBasics;

/**
 * Classe filha, usada para exemplificação simples de conceitos de herança
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class Daughter extends Mother
{
    /**
     * Armazena nome
     * @var string $name
     */
    protected $name;

    /**
     * Método construtor da classe
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Método seta propriedade $name, não retorna valor, função de atribuição, apenas.
     * @return void Não há retorno
     * @param string $name Valor do parâmetro será atribuído à propriedade $name do objeto.
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * Método retorna valor da propriedade $name.
     * @return string Retorna valor da propriedade $name
     */
    public function getName()
    {
        return $this->name;
    }
}
