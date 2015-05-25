<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @package Test\PHPBasics
 */
namespace Test\PHPBasics;

/**
 * Class RawCasting
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group PHPBasics
 * @group PHPBasics/RawCasting
 */
class RawCasting extends \PHPUnit_Framework_TestCase
{
    /**
     * The testIntBool method testa conversão de inteiro para booleano.
     * Verifica-se que quanto o inteiro é maior que zero, o cast para boolean atribuirá valor true,
     * e caso o número seja 0
     * @return void
     */
    public function testCastingIntBool()
    {
        $number = 12;
        $this->assertTrue((bool) $number);
        $zero = 0;
        $this->assertFalse((bool) $zero);
        $negative = -5;
        $this->assertFalse((bool) $negative);
    }

    /**
     * The testCastingBoolInt method
     * @return void
     */
    public function testCastingBoolInt()
    {
        
    }
}
