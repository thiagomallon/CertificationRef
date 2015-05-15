<?php

/**
 * Created by Thiago Mallon
 */

 /**
  * @package Test\OOProgramming
  */
 namespace Test\OOProgramming;

/**
 * Classe PeculiarCallsTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group PeculiarCallsTest
 * @group OOProgramming/PeculiarCallsTest
 */
class PeculiarCallsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Propriedade protected se faz objeto da classe App\OOProgramming\OODaughter
     * @var object $_daughter
     */
    protected $_daughter;

    /**
     * Método sobrescrito do PHPUnit, chamado antes de cada método de teste
     * @return void 
     */
    public function setUp()
    {
        // instancia classe à ser testada
        $this->_daughter = new \App\OOProgramming\OODaughter;
    }

    /**
     * Método sobrescrito do PHPUnit, chamado após finalização de cada método de teste
     * @return void
     * 
     */
    public function tearDown()
    {
        unset($this->_daughter); // desaloca objeto
    }

    /**
     * Método testa chamada à método passando string, de um olhar mais analítico
     * vemos que é algo totalmente possível, já que o PHP interpreta string como 
     * métodos, só bastando colocar-se parênteses ao final da declaração.
     * @return void
     * @covers App\OOProgramming\OODaughter::setName
     * @covers App\OOProgramming\OODaughter::getName
     */
    public function testFirstMode()
    {
        $stub = $this->getMockBuilder('\App\OOProgramming\OODaughter')
        ->setMethods(null)
        ->getMock();

        /* PECULIAR CALLS by Mallon */
        $stub->{'setName'}('Matilda');
        $name = $stub->{'getName'}();

        $this->assertEquals('Matilda', $name);
    }

    /**
     * Método implementa instanciamento imediato, que só existe na linha de execução, logo
     * após a expressão, o objeto é destruído, a não ser que seja retornada uma instância da 
     * mesma.
     * @return void
     * @covers App\OOProgramming\OODaughter::setName
     * @covers App\OOProgramming\OODaughter::getName
     */
    public function testSecondMode()
    {                
        /* PECULAR CALLS by Mallon */
        $otherName = (new \App\OOProgramming\OODaughter())->getName();        
        $this->assertEquals('MotherClass!DaughterClass!', $name);
    }
}
