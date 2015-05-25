<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-05-05 at 15:23:17.
 */

/**
 * @subpackage Test\PHPBasics
 */
namespace Test\PHPBasics;

/**
 * Classe de testes do objeto de Daughter
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group PHPBasics
 * @group PHPBasics/DaughterTest
 */
class DaughterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Instância do classe Daughter
     * @var object $_daughter
     */
    protected $_daughter;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed
     */
    public function setUp()
    {
        $this->_daughter = new \App\PHPBasics\Daughter();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        unset($this->_daughter);
    }

    /**
     * Método verifica herança de instância de Daughter por Mother
     * @return void
     */
    public function testDaughterInheritance()
    {
        $this->assertInstanceOf('\App\PHPBasics\Mother', $this->_daughter);
    }
    
    /**
     * Método verifica retorno da função getName()
     * @return void
     */
    public function testNameSeting()
    {
        $this->_daughter->setName('Someone');
        $this->assertContains('Someone', $this->_daughter->getName());
    }

    /**
     * Testo a correta funcionalidade do método sobrescrito do PHPUnit, tearDown();
     * @return void;
     */
    public function testNameGetting()
    {
        $this->assertNull($this->_daughter->getName());
    }
}
