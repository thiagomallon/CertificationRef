<?php

/**
 * Created by Thiago Mallon
 */

 /**
  * @subpackage Test\Arrays
  */
 namespace Test\Arrays;

/**
 * Classe ArrayPointerTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group Arrays
 * @group Arrays/ArrayPointerTest
 */
class ArrayPointerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Propriedade protected se faz objeto da classe
     * @var array $_setOfStuff
     */
    protected $_setOfStuff;
    
    /**
     * Método sobrescrito do PHPUnit, chamado antes de cada método de teste
     * @return void
     */
    public function setUp()
    {
        $this->_setOfStuff = [
        '1st' => 'first',
        '2nd' => 'second',
        '3rd' => 'third',
        '4th' => 'fourth',
        '5th' => 'fifth',
        ];
    }
    
    /**
     * Método sobrescrito do PHPUnit, chamado após finalização de cada método de teste
     * @return void
     */
    public function tearDown()
    {
        unset($this->_setOfStuff);
    }

    /**
     * Método implementa uso da função current(), para lidar com ponteiro de arrays.
     * Como estamos usando fixtures para 'refazer' uma chamada imediata à função current()
     * (sem antes ter sido atribuída nenhuma ação ao array) fará com que a função retorne
     * o valor 'first', que é o valor do primeiro elemento.
     * @return void
     */
    public function testCurrent()
    {
        $this->assertEquals('first', current($this->_setOfStuff));
    }

    /**
     * Método implementa uso da função next(), de manipulação de ponteiros de array. Utilizo também
     * a função current(), para resgatar a atual posição do mesmo.
     * @return void
     */
    public function testNext()
    {
        next($this->_setOfStuff); // incrementamos o ponteiro do array
        $this->assertEquals('second', current($this->_setOfStuff));
    }

    /**
     * Método implementa uso da função end(), que tem por finalidade posicionar o ponteiro do array no
     * último elemento do mesmo.
     * @return void
     */
    public function testEnd()
    {
        end($this->_setOfStuff); // posiciona-se ponteiro no último elemento do array
        $this->assertEquals('fifth', current($this->_setOfStuff));
    }

    /**
     * Método implementa uso da função prev(), que volta ponteiro uma posição, relativamente à posição
     * atual do mesmo.
     * @return void
     */
    public function testPrev()
    {
        end($this->_setOfStuff); // posiciona-se ponteiro no último elemento
        prev($this->_setOfStuff); // retorna-se uma posição relativamente ao posicionamento atual do ponteiro
        $this->assertEquals('fourth', current($this->_setOfStuff));
    }

    /**
     * Método faz uso da função each(), que retorna um novo array, contendo o índice e o valor do elemento ao qual
     * o ponteiro em sua presente posição, está apontando.
     * @return void
     */
    public function testEach()
    {
        next($this->_setOfStuff);
        next($this->_setOfStuff); // expressão atual e anterior implementam reposicionamento do ponteiro na terceira posição do array
        $actual = each($this->_setOfStuff); // implementa função each()
        // print_r($actual);
        $this->assertCount(4, $actual); // função each retorna array com 4 elementos - ver resultado do print_f();
        $this->assertContains('third', $actual); // verifica se array tem, em quaisquer das posições, um índice com elemento de valor 'third'
        $this->assertArrayNotHasKey('3rd', $actual); // verifica se array possui algum índice com dado identificador
    }

    /**
     * Método implementa função reset() de manipulação de posição de ponteiros de array. A função retorna o ponteiro do
     * array para o primeiro elemento do mesmo.
     * @return void
     */
    public function testReset()
    {
        end($this->_setOfStuff); // coloca ponteiro no último elemento
        $this->assertEquals('fifth', current($this->_setOfStuff)); // certifica-se de que o ponteiro se encontra no último elemento

        reset($this->_setOfStuff); // coloca ponteiro no primeiro elemento
        $this->assertEquals('first', current($this->_setOfStuff)); // certifica-se de que o ponteiro voltou para o primeiro elemento
    }
}
