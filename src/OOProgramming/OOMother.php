<?php
/**
 * Created by Thiago Mallon
 */

namespace App\OOProgramming;

class OOMother
{
    protected $name;

    public function __construct()
    {

    }

    public function getInstance()
    {
        return new static(); // retorna instância estática do objeto
    }

    public function returnObjVars()
    {
        return get_object_vars($this);
    }

    public function returnArgsPassed()
    {
        return func_get_args();
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
}
