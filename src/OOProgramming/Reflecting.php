<?php

/* Classe implementada, para serem testados os conceitos da API Reflection do PHP. 
 * Nesta, apenas são declarados alguns métodos e propriedades. Para ver funcionamento
 * do Reflection, ir ao arquivo de teste.
 */
namespace App\OOProgramming;

/**
 * @codeCoverageIgnore
 */
class Reflecting
{

    protected $setOUnaccessibles = [];
    private $unreal;
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

    public function getRealLife()
    {
        return $this->realLife;
    }
    
    public function setRealLife($realLife)
    {
        $this->realLife = $realLife;
    }
}
