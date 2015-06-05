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
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $this->_standardLib = new \App\OOProgramming\StandardLibrary;
    }
    
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        unset($this->_standardLib);
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
}
