<?php
/**
 * Created by Thiago Mallon
 */

namespace App\OOProgramming;

/**
 * Classe implementada, para serem testados os conceitos da API Reflection do PHP.
 * Nesta, apenas são declarados alguns métodos e propriedades. Para ver funcionamento
 * do Reflection, ir ao arquivo de teste.
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class Reflecting
{
    /**
     * Array armazena nome e valor de propriedades inacessíveis
     * @var array $setOUnaccessibles
     * Array armazena nome e valor de propriedades inacessíveis
     */
    protected $setOUnaccessibles = [];
    /**
     * Variável sem tipo definido, de uso geral
     * @var mixed $realLife
     * Variável sem tipo definido, de uso geral
     */
    protected $realLife;

    public function __call($name, $args)
    {
        return $args;
    }

    public function __set($name, $value)
    {
        $this->setOUnaccessibles[$name] = $value;
    }

    public function __get($name)
    {
        return $this->setOUnaccessibles[$name];
    }

    /**
     * Retorna propriedade realLife
     * @return mixed Retorna propriedade $realLife
     */
    public function getRealLife()
    {
        return $this->realLife;
    }
    
    /**
     * Atribui valor à propriedade $realLife
     * @return void Atribui valor à propriedade $realLife
     */
    public function setRealLife($realLife)
    {
        $this->realLife = $realLife;
    }
}
