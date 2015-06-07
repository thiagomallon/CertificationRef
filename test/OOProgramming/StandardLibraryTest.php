<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage Test\OOProgramming
 */
namespace Test\OOProgramming;

/**
 * Class StandardLibraryTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group OOProgramming
 * @group OOProgramming/StandardLibraryTest
 */
class StandardLibraryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Protected property stores object instance
     * @var object $_standardLib
     */
    protected $_standardLib;
    /**
     * Property stores
     * @var datatype $_daughter description
     */
    protected $_daughter;
    
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $this->_standardLib = new \App\OOProgramming\StandardLibrary;
        $this->_daughter = new \App\OOProgramming\Daughter;
    }
    
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        unset($this->_standardLib);
        unset($this->_daughter);
    }

    /**
     * The testGenerating method implementa testes à classe generator da SPL
     * @covers App\OOProgramming\StandardLibrary::generating
     * @return null
     */
    public function testGenerating()
    {
        /* faz chamada à função que implementa o Generator e armazena retorno (instância de Generator) */
        $generator = $this->_standardLib->generating();
        $this->assertInternalType('object', $generator); // verifica se retorno é do tipo objeto, se é uma instância
        $this->assertInstanceOf('Generator', $generator); // verifica se retorno é instância de generator

        $this->assertTrue($generator->valid()); // verifica se iterator está aberto
        $this->assertEquals('first-checkpoint', $generator->current()); // primeiro yield é chamado. Verifica-se que ponteiro é colocado no começo após instanciamento.
        $this->assertEquals('first', $this->_standardLib->checkpoint); // verifica-se valor da propriedade, que é alterado na função que implementa Generator

        $generator->next(); // avança um yield
        $this->assertTrue($generator->valid()); // verifica se iterator está aberto
        $this->assertEquals('second-checkpoint', $generator->current()); // segundo yield é retornado
        $this->assertEquals('second', $this->_standardLib->checkpoint); // valor da propriedade é alterado

        $generator->next(); // avança mais um yield
        $this->assertTrue($generator->valid()); // verifica se iterator está aberto
        $this->assertEquals('third-checkpoint', $generator->current()); // terceiro yield é retornado
        $this->assertEquals('third', $this->_standardLib->checkpoint); // valor da propriedade é alterado

        $generator->next(); // avança mais um yield
        $this->assertFalse($generator->valid()); // verifica se iterator está fechado
    }

    /**
     * The testGenerationFeatException method verifica que após uso do método next(), não se pode mais utilizar o método
     * rewind() do Generator, do contrário, uma exceção é gerada
     * @covers App\OOProgramming\StandardLibraby::generating
     * @expectedException Exception
     * @expectedExceptionMessage Cannot rewind a generator that was already run
     * @return null
     */
    public function testGenerationFeatExceptio()
    {
        /* faz chamada ao método que implementa o Generator, o que retorna uma instância do mesmo */
        $generator = $this->_standardLib->generating();

        $generator->next(); // avança mais um yield
        $this->assertEquals('second-checkpoint', $generator->current()); // segundo yield é retornado
        $this->assertEquals('second', $this->_standardLib->checkpoint); // valor da propriedade é alterado

        $generator->rewind(); // retorna ao primeiro yield
    }

    /**
     * The testClassUses method implementa função class_uses(), que retorna trais utilizados pelo objeto.
     * A função retorna um array associativo, cujo índice e valor são o nome do trait usado (duplicidade de índice
     * e valor).
     * @return null
     */
    public function testClassUses()
    {
        $res = class_uses($this->_daughter);
        // print_r($res);
        $this->assertArrayHasKey('App\OOProgramming\CPFValidatorTrait', $res); // verifica índices
        $this->assertContains('App\OOProgramming\CPFValidatorTrait', $res); // verifica valores dos índices
    }

    /**
     * The testClassParents method impĺementa uso da função class_parents(), que retorna array de classes ancestrais
     * do objeto passado. Assim como a função acima, talvez sendo uma característica das funções SPL, a função retorna
     * um array associativo cujos elementos possuem chave e valor iguais, sendo esses uma classe ancestral. Outro ponto
     * interessante na função é que ela retorna toda a ancestralidade da classe e não apenas o parente direto. A classe
     * Daughter herda da classe Mother, que, por sua vez, herda da classe GrandMa, sendo assim a classe retorna um
     * array com dois elementos, a classe Mother e a classe GrandMa
     * @return null
     */
    public function testClassParents()
    {
        $res = class_parents($this->_daughter);
        // print_r($res);
        // Mother
        $this->assertArrayHasKey('App\OOProgramming\Mother', $res); // verifica índices
        $this->assertContains('App\OOProgramming\Mother', $res); // verifica valores dos índices
        // GrandMa
        $this->assertArrayHasKey('App\OOProgramming\GrandMa', $res); // verifica índices
        $this->assertContains('App\OOProgramming\GrandMa', $res); // verifica valores dos índices
    }

    /**
     * The testClassImplements method implementa função class_implements(), que retorna array com interfaces
     * implementadas pelo objeto. Assim como as duas funções anteriores, a presente função retorna um array
     * associativo, contendo o nome das interfaces implementadas tanto no índice, quanto no valor de cada
     * elemento.
     * @return null
     */
    public function testClassImplements()
    {
        $res = class_implements($this->_daughter);
        // print_r($res);
        $this->assertArrayHasKey('App\OOProgramming\FamilyInterface', $res); // verifica índices
        $this->assertContains('App\OOProgramming\FamilyInterface', $res); // verifica valores dos índices
    }
}
