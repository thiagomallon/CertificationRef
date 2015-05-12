<?php

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-05-05 at 11:58:43.
 */

/**
 * @package Test\OOProgramming
 */
namespace Test\OOProgramming;

/**
 * Classe testa conceito de Reflection do PHP
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group OOProgramming
 * @group OOProgramming/ReflectingTest
 */
class ReflectingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Instância da classe ReflectionClass do PHP
     * @var object $_classReflecting
     */
    protected $_classReflecting; // armazenará instância de Reflection
    /**
     * Instância de Reflecting
     * @var object $_objOnReflection
     */
    protected $_objOnReflection; // armazenará instância da classe a ser testada pela API Reflection

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $this->_objOnReflection = new \App\OOProgramming\Reflecting();
        $this->_classReflecting = new \ReflectionClass($this->_objOnReflection);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        unset($this->_classReflecting);
    }

    /**
     * Método testa método getMethods da classe ReflectionClass do PHP, atribuída
     * ao objeto da classe implementada, Reflecting. Verifica-se a quantidade de
     * métodos declarados na classe implementada. O método getMethods() da classe
     * ReflectionClass do PHP, retorna array com especificações dos métodos existentes
     * no objeto da classe implementada, Reflecting.
     * @return void
     */
    public function testObjMethods()
    {
        // var_dump($this->_classReflecting->getMethods());
        // abaixo confirma existência de 5 métodos na classe
        $this->assertCount(3, $this->_classReflecting->getMethods());
    }

    /**
     * Método testa método getProperties da classe ReflectionClass do PHP, atribuída
     * ao objeto da classe implementada, Reflecting. Verifica-se a quantidade de
     * propriedades declaradas na classe implementada. O método getProperties() da classe
     * ReflectionClass do PHP, retorna array com especificações das propriedades existentes
     * no objeto da classe implementada, Reflecting.
     * @return void
     */
    public function testObjProperties()
    {
        // bloco abaixo testa se propriedade não vazia exibe valor - resultado negativo
        // $this->_objOnReflection->setRealLife('This is real!');
        // $this->_classReflecting = new \ReflectionClass($this->_objOnReflection);
        // var_dump($this->_classReflecting->getProperties());

        // abaixo confirma existência de 3 propriedades na classe
        $this->assertCount(2, $this->_classReflecting->getProperties());
    }
}
