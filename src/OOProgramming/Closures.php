<?php

namespace App\OOProgramming;

/*
 * Não pode:
 *  - utilizar-se propriedades da classe como parâmetros do closure
 *  - utilizar-se propriedades da classe como parâmetro para a diretiva use 
 * Pode:
 * - referenciar-se propriedades do objeto dentro do closure.
 * - 
 */
class Closures
{
    /* propriedades */
    protected $property1;
    protected $property2;
    protected $property3;

    public function getClosure()
    {
        /* closure na sua forma mais simples, apenas retorna uma literal */
        $closure = function () {
            return 'This closure is saying hi!';
        };
        return $closure; // retorna closure
    }

    public function getClosureFeatParam()
    {
        /* closure recebe parâmetro, então o retorna */
        $closure = function ($something) {
            return $something;
        };
        return $closure; // retorna closure
    }

    public function getClosureFeatProperty()
    {
        /* closure recebe parâmetro, o atribui à propriedade da classe e retorna propriedade */
        $closure = function ($something) {
            $this->property1 = $something;
            return $this->property1;
        };
        return $closure; // retorna closure
    }

    public function getClosureFeatPropertyParam($beginPhrase)
    {
        /* método recebe parâmetro, que é atribuído ao closure, através do use,
         * o atribui à propriedade da classe e retorna propriedade */
        $closure = function ($something) use ($beginPhrase) {
            $this->property1 = $beginPhrase.$something;
            return $this->property1;
        };
        return $closure; // retorna closure
    }

    public function getProperty1()
    {
        return $this->property1;
    }
}