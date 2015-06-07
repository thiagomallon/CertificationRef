<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage Test\OOProgramming
 */
namespace Test\OOProgramming;

/**
 * Class ObjectFunctionsTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group OOProgramming
 * @group OOProgramming/ObjectFunctionsTest
 */
class ObjectFunctionsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Protected property stores object instance
     * @var object $_daughter
     */
    protected $_daughter;
    
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $this->_daughter = new \App\OOProgramming\Daughter;
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
     * The testGetParentClass method implementa função get_parent_class(), que retorna o parente direto da classe.
     * A classe Daughter herda da classe Mother, que, por sua vez, herda da classe GrandMa, porém, a função
     * get_parent_class() somente retorna a classe Mother. Sendo assim a função pode ser tão somente utilizada
     * para retorno do parente direto e não de toda cadeia de herança.
     * @return null
     */
    public function testGetParentClass()
    {
        $daughterParent = get_parent_class($this->_daughter); // submete-se a instância à função get_parent_class()
        $this->assertEquals('App\OOProgramming\Mother', $daughterParent); // verifica-se retorno, que consiste-se apenas de string indicativa de parente direto (ou mais próximo)
    }

    /**
     * The testClassAlias method implementa função get_class(), que retona o nome da classe relativa
     * à instância passada
     * @return null
     */
    public function testClassAlias()
    {
        $res = get_class($this->_daughter);
        $this->assertEquals('App\OOProgramming\Daughter', $res);
    }

    /**
     * The testIsA method implemenenta função is_a(), que verifica se dado objeto (primeiro parâmetro)
     * é instancia de dada classe (segundo parâmetro)
     * @return null
     */
    public function testIsA()
    {
        $this->assertTrue(is_a($this->_daughter, 'App\OOProgramming\Daughter'));
    }

    /**
     * The testIsSubclassOf method implementa função is_subclass_of(), que verifica se dado objeto
     * (primeiro parâmetro) é subclasse de dada classe (segundo parâmetro)
     * @return null
     */
    public function testIsSubclassOf()
    {
        $this->assertTrue(is_subclass_of($this->_daughter, 'App\OOProgramming\GrandMa'));
    }

    /**
     * The testMethodExists method implementa função method_exists(), que verifica se dado objeto (primeiro parâmetro)
     * possui dado método (segundo parâmetro) como membro.
     * @return null
     */
    public function testMethodExists()
    {
        $this->assertTrue(method_exists($this->_daughter, 'sayHello'));
    }

    /**
     * The testGetObjectVars method implementa função get_object_vars(), que retorna propriedades do objeto
     * passado. Foi-se observadas duas abordagens:
     * - Quando chamada dentro da classe, e recebendo $this, a função pode retornas todas as propriedades, inclusive
     * as privates e protecteds.
     * - Quando chamada passando-se uma instância de uma classe externa, a função retorna apenas as propriedades
     * públicas.
     * @return null
     */
    public function testGetObjectVars()
    {
        $objectStuff = get_object_vars($this->_daughter);
        // print_r($objectStuff);
        $this->assertArrayHasKey('publicStuff', $objectStuff);
        $this->assertContains('Yes, you can see this', $objectStuff);
    }

    /**
     * The testGetClassMethods method faz uso da função get_class_methods(), que retorna array numérico de métodos
     * da classe. É importante observar que todos os métodos, incluíndo os métodos das classes ancestrais são
     * retornados, porém, sem duplicidate, ou seja, métodos de classes ancestrais, sobrescritos, são listados
     * ocorrem apenas uma vez no array.
     * @return null
     */
    public function testGetClassMethods()
    {
        $methods = get_class_methods($this->_daughter);
        // print_r($methods);
        $this->assertContains('setName', $methods[1]);
    }

    /**
     * The testGetClassVars method faz uso da função get_class_vars(), que retorna array com propriedades públicas
     * da classe passada. Diferentemente da função get_class_methods(), que espera uma instância, a função
     * get_class_vars() espera uma string, com o nome da classe a qual se deseja obter as propriedades.
     * @return null
     */
    public function testGetClassVars()
    {
        $props = get_class_vars('App\OOProgramming\Daughter');
        // print_r($props);
        $this->assertArrayHasKey('publicStuff', $props); // verifica-se se existe índice
        $this->assertContains('Yes, you can see this', $props['publicStuff']); // verifica-se o valor do elemento, para dado índice
    }
}
