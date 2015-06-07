<?php

/**
 * Created by Thiago Mallon
 */

 /**
  * @subpackage Test\Functions
  */
namespace Test\Functions;

/**
 * Classe FunctionsTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group FunctionsTest
 * @group Functions/FunctionsTest
 */
class FunctionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Método implementa função sscanf() do PHP.
     * @return null
     */
    public function testSscanf()
    {
        
    }

    /**
     * Method testDynamically implements chamada dinâmica à funções/métodos.
     * @return datatype  description
     */
    public function testDynamically()
    {
        $daughter = new \App\OOProgramming\Daughter; // instancia classe
        $res = $daughter->{'getName'}(); // chamada dinâmica à método da classe Daughter

        $this->assertEquals('MotherClass!DaughterClass!', $res); // verifica retorno do método
    }
}
