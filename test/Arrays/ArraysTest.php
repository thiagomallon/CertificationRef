<?php
/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-05-05 at 12:12:07.
 */

/**
 * @package Test\Arrays
 */
namespace Test\Arrays;

/**
 * Classe de testes do objeto Arrays
 * @group Arrays
 * @group ArrayStuffTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class ArraysTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Propriedade consiste-se em um array de elementos variados, para fins de testes.
     * @var array $setOfStuff
     */
    protected $setOfStuff;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $this->setOfStuff = [
        "1st"=>"first",
        "2nd"=>"second",
        "3rd"=>"Third",
        "dont" => "do_not",
        "wanna" => "want_to"
        ];
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        unset($this->setOfStuff);
    }
    
    /**
     * Método testa função in_array() do PHP. Função verifica se existe dado
     * valor em qualquer um dos índices do array passado e retorna true caso
     * ocorra.
     * @return void
     */
    public function testInArrayImplement()
    {
        $stuffResult = in_array("second", $this->setOfStuff);
        $this->assertTrue($stuffResult);
    }

    /**
     * Método testa função array_keys do PHP. Quando um array é passado à função,
     * a mesma retornará um novo array, com os elementos desse último como valores
     * e os índices, dessa vez, númericamente indexados.
     * @return void
     */
    public function testArrayKeysImplement()
    {
        $indexesOfStuff = array_keys($this->setOfStuff);
        $this->assertArrayNotHasKey("1st", $indexesOfStuff);
    }

    /**
     * Método testa função array_key_exists() do PHP. Função verifica se existe
     * dado índice no array e retorna true caso ocorra.
     * @return void
     */
    public function testArrayKeyExistsImplement()
    {
        $this->assertTrue(array_key_exists("3rd", $this->setOfStuff));
    }

    /**
     * Método testa função array_values do PHP. Quando um array é passado à função
     * a mesma devolve um novo array, com os valores do antigo, porém, com novos índices,
     * dessa vez numericamente indexados.
     * @return void
     */
    public function testArrayValuesImplement()
    {
        $valuesOfStuffs = array_values($this->setOfStuff);
        $this->assertContains('do_not', $valuesOfStuffs);
    }

    /**
     * Método testa função array_flip do PHP. Função recebe um array e devolve o mesmo com índices
     * e valores invertidos, ou seja, índice no lugar do valor e vice-versa.
     * @return void
     */
    public function testArrayFlipImplement()
    {
        $invertedStuf = array_flip($this->setOfStuff);
        $this->assertArrayHasKey('want_to', $invertedStuf);
    }
}