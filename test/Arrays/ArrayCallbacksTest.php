<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage Test\Arrays
 */
namespace Test\Arrays;

/**
 * Classe ArrayCallbacksTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group Arrays
 * @group Arrays/ArrayCallbacksTest
 */
class ArrayCallbacksTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Protected property stores object instance
     * @var object $localSet
     */
    protected $localSet;
    
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $this->localSet = ['1st'=>'first',
        '2nd'=>'second',
        '3rd'=>'third'];
    }
    
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        $this->localSet = null;
    }

    /**
     * Método implementa teste à função array_map() do PHP.
     * A função submete cada elemento do array passado à uma função callback, que pode ser tanto uma função externa,
     * ou um método (em caso de escopo de classe), ou um closure. No exemplo abaixo utilizamos um closure como a função
     * callback. O closure receberá cada elemento do array e poderá então alterar o valor de cada índice recebido.
     * @return null
     */
    public function testArrayMap()
    {
        /* manipulação dos valores do array */
        $res = array_map(function ($element) {
            return $element.' - interceptado pelo closure';
        }, $this->localSet);/* manipulação dos valores do array */
        // print_r($res); // aqui observamos a concatenação de uma string à cada valor de cada elemento do array passado
        $this->assertContains('first - interceptado pelo closure', $res);
    }

    /**
     * Método implementa função array_walk(), que possibilita o uso de função callback, para tratamento de valores e/ou
     * índices do array navegado. Função muito útil, e em adição à função array_map(), ela permite alteração também dos
     * índices, equanto a array_map() somente de valores.
     * @return null
     */
    public function testArrayWalk()
    {
        array_walk($this->localSet, function (&$value, $key) {
            $value = $value . " place"; // adiciona a string ' place' ao valor de cada elemento do array
        });
        //print_r($localSet);
        $this->assertContains('first place', $this->localSet);
    }
}
