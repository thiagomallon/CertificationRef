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
 * @group OOProgramming
 * @group OOProgramming/PeculiarCallsTest
 */
class PeculiarCallsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Método testa chamada à método passando string, de um olhar mais analítico
     * vemos que é algo totalmente possível, já que o PHP interpreta string como
     * métodos, só bastando colocar-se parênteses ao final da declaração.
     * @return void
     * @covers App\OOProgramming\Daughter::setName
     * @covers App\OOProgramming\Daughter::getName
     */
    public function testFirstMode()
    {
        $stub = $this->getMockBuilder('\App\OOProgramming\Daughter')
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
     * @covers App\OOProgramming\Daughter::setName
     * @covers App\OOProgramming\Daughter::getName
     * @return void
     */
    public function testSecondMode()
    {
        /* PECULAR CALLS by Mallon */
        $name = (new \App\OOProgramming\Daughter())->getName();
        $this->assertEquals('MotherClass!DaughterClass!', $name);
    }

    /**
     * Método estático de teste, testa chamada peculiar em método estático
     * @covers App\OOProgramming\GrandMa::sayHello
     * @return void
     */
    public static function testStaticFirsMode()
    {
        $salute = \App\OOProgramming\GrandMa::{'sayHello'}(); // faz chamada peculiar
        self::assertEquals('Hello, how are you, son?!', $salute); // testa retorno
    }
}
