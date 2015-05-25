<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-05-05 at 16:55:51.
 */

/**
 * @subpackage Test\OOProgramming
 */
namespace Test\OOProgramming;

/**
 * Classe de testes do objeto Closure
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group OOProgramming
 * @group OOProgramming/ClosuresTest
 */
class ClosuresTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Closure $_closures
     * $_closures se faz instância de Clousures.
     */
    protected $_closures;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->_closures = new \App\OOProgramming\Closures();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        unset($this->_closures);
    }

    /**
     * Testa-se a forma mais simples de um closure declarado em escopo de método.
     * Neste closure, apenas é retornada uma string, com uma mensagem genérica.
     * @covers \App\OOProgramming\Closures::getClosure
     */
    public function testGetClosure()
    {
        $closure = $this->_closures->getClosure();
        $this->assertEquals('This closure is saying hi!', $closure());
    }

    /**
     * O closure testao implementa recebimento de parâmetro e atribui o mesmo a uma
     * propriedade do objeto do qual é membro.
     * @covers \App\OOProgramming\Closures::getClosureFeatParam
     */
    public function testGetClosureFeatParam()
    {
        $closure = $this->_closures->getClosureFeatParam();
        $this->assertEquals('Callback message...', $closure('Callback message...'));
    }

    /**
     * Neste método é verificado que closures podem alterar propriedades da classe
     * em que foi criado. Observamos por chamar o método getProperty1(), que nos retornou a
     * string que passamos ao closure, que por sua vez atribui à propriedade $property1 do
     * objeto Clousures.
     * @covers \App\OOProgramming\Closures::getClosureFeatProperty
     */
    public function testGetClosureFeatProperty()
    {
        $closure = $this->_closures->getClosureFeatProperty();
        $this->assertEquals('Give me back!', $closure('Give me back!'));
        $this->assertEquals('Give me back!', $this->_closures->getProperty1());
    }

    /**
     * Método testa se closure é instância da classe testada e não é. Apesar
     * de o closure poder alterar propriedades da classe a qual pertence, o mesmo
     * não se faz instância da última.
     * @covers \App\OOProgramming\Closures::getClosureFeatProperty
     */
    public function testClousureInstance()
    {
        $closure = $this->_closures->getClosureFeatProperty();
        // verifica se closure é instância do objeto Closure, do PHP
        $this->assertInstanceOf('\Closure', $closure);
        // verifica se closure não é instância da classe testada
        $this->assertNotInstanceOf('\App\OOProgramming\Closures', $closure);
    }

    /**
     * O closure testado espera um parâmetro na sua chamada e também faz uso de
     * dados externos, pela palavra chave 'use'. Para argumento do 'use', passamos
     * o parâmetro atribuído ao método que contém o closure. Este closure também
     * altera uma propriedade da classe testada.
     * @covers \App\OOProgramming\Closures::getClosureFeatPropertyParam
     */
    public function testGetClosureFeatPropertyParam()
    {
        $closure = $this->_closures->getClosureFeatPropertyParam('The begin...');
        $this->assertContains('begin...and', $closure('and the end'));
        $this->assertContains('begin...and the', $this->_closures->getProperty1());
    }

    /**
     * Método exemplifica uso de closure como callback, para a função array_map(), que
     * faz uso de funções de callback em sua chamada.
     * @return void
     */
    public function testArrayMapCallback()
    {
        // cria array com valores em lower case
        $conjunto = ["primeiro",'segundo','terceiro'];

        // chama função array_map, utilizando closure como seu callback
        $conjuntoUpper = array_map(function ($conjunto) {
            return strtoupper($conjunto); // converte valor do elemento para uppercase
        }, $conjunto);

        $this->assertNotContains('segundo', $conjuntoUpper); // verifica se não contém o elemento em lowcase
        $this->assertContains('SEGUNDO', $conjuntoUpper); // verifica se contém o elemento em uppercase
    }

    /**
     * Método apresenta outra forma de se chamar métodos do objeto. A abordagem da-se por
     * chamar array como função, sendo assim, o valor do primeiro elemento será o objeto
     * e o segundo o método que se deseja invocar. Verificamos também, nesse exemplo, que
     * não é criado um novo objeto, a expressão é, de fato, o que aparente, o objeto é atribuído
     * ao callback, logo, mantém o valor da propriedade $property1.
     * @return void
     */
    public function testObjectMethodCall()
    {
        $this->_closures->setProperty1('Valor atribuído à $property1');

        $callback = [$this->_closures, 'getProperty1']; // aqui atribui-se o método do objeto à variável $callback
        $this->assertEquals('Valor atribuído à $property1', $callback()); // por fim, testamos o valor retornado do closure
    }

    /**
     * Método apresenta uma variação de chamada de método via array. A diferença entre a abordagem seguinte,
     * da abordagem exemplificado no exemplo anterior, é que no seguinte atribuímos o nome da classe, logo
     * um novo objeto é criado e no anterior o objeto já instanciado é atribuído.
     * @return void
     */
    public function testStaticMethod()
    {
        $callback = ['App\OOProgramming\Closures', 'getClosure']; // aqui atribui-se o método do objeto à variável $callback
        $myClosure = $callback(); // como o método retorna o closure, aqui atribuímos o closure à variável $myClosure
        $this->assertEquals('This closure is saying hi!', $myClosure()); // por fim, testamos o valor retornado do closure
    }
}
