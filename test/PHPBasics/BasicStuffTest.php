<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-05-05 at 16:22:01.
 */

/**
 * @package Test\PHPBasics
 */
namespace Test\PHPBasics;

/**
 * Classe de testes do objeto de BasicStuff
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group PHPBasics
 * @group PHPBasics/BasicStuffTest
 */
class BasicStuffTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Instância da classe BasicStuff
     * @var object $_basicStuff
     */
    protected $_basicStuff;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $this->_basicStuff = new \App\PHPBasics\BasicStuff();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        unset($this->_basicStuff);
    }

    /**
     * Método testa retorno da função is_a() do PHP, que é o retorno do método isAImplement() do
     * objeto. A função retorna valor boleano após verificar se dada instância no primeiro argumento
     * é um objeto do tipo da classe especificada no segundo parâmetro.
     * @return void
     */
    public function testIsAImplement()
    {
        // testa função is_a() do PHP
        $this->assertTrue($this->_basicStuff->isAImplement());
    }
}
