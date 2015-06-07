<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage Test\PHPBasics
 */
namespace Test\PHPBasics;

/**
 * Class RawCasting
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group PHPBasics
 * @group PHPBasics/RawCasting
 */
class RawCastingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The testIntBool method testa conversão de inteiro para booleano.
     * Expressões e resoluções:
     *
     * true = (bool) 5; // números maiores que 0 são convertidos para true
     * false = (bool) 0; // valores 0 são convertidos para false
     * true = (bool) -5; // números negativos são convertidos para true
     *
     * @return null
     */
    public function testCastingIntBool()
    {
        $number = 12; // inteiro positivo
        $this->assertTrue((bool) $number); // quando convertido para bool, torna-se true

        $zero = 0; // valor 0
        $this->assertFalse((bool) $zero); // quando convertido para bool, torna-se false

        $negative = -5; // valor negativo
        $this->assertTrue((bool) $negative); // quando convertido para bool, torna-se true
    }

    /**
     * The testCastingBoolInt method verifica conversão de tipos booleanos, para inteiros
     *
     * Expressões e resoluções:
     *
     * 1 = (int) true;
     * 0 = (int) false;
     *
     * @return null
     */
    public function testCastingBoolInt()
    {
        $right = true; // boleano true
        $this->assertEquals((int) $right, 1); // quando convertido para inteiro, torna-se 1

        $wrong = false; // boleano false
        $this->assertEquals((int) $wrong, 0); // quando convertido para inteiro, torna-se 0
    }

    /**
     * The testCastingStrBool method testa casting de string para bool
     *
     * Expressões e resoluções:
     *
     * true = (bool) '1'
     * true = (bool) 'a'
     * false = (bool) '0'
     * false = (bool) ''
     * true = (bool) '-1'
     *
     * @return null
     */
    public function testCastingStrBool()
    {
        $one = '1';
        $this->assertTrue((bool) $one);

        $letter = 'a';
        $this->assertTrue((bool) $letter);

        $zero = '0';
        $this->assertFalse((bool) $zero);

        $empty = '';
        $this->assertFalse((bool) $empty);

        $negative = '-1';
        $this->assertTrue((bool) $negative);
    }

    /**
     * The testCastingBoolStr method verifica resultado de castings entre string e boolean
     *
     * Expressões e resoluções:
     * '1' = (string) true;
     * '' = (string) false;
     *
     */
    public function testCastingBoolStr()
    {
        $right = true; // boolean true
        $this->assertEquals('1', (string) $right); // verifica resultado da conversão

        $wrong = false; // boolean false
        $this->assertNotEquals('0', (string) $wrong); // verifica-se que não é convertido para '0'
        $this->assertEquals('', (string) $wrong); // no caso, converte-se para ''
        $this->assertEmpty((string) $wrong); // equivale a empty
    }

    /**
     * The testCastingIntString method verifica resultados de conversão de inteiros para strings
     *
     * '123' = (string) 123
     *
     */
    public function testCastingIntString()
    {
        $number = 123;
        $this->assertEquals('123', (string) $number);
    }

    /**
     * The testCastingStringInt method implementa casting de valor string para valor integer, verificando-se
     * que esse tipo de conversão sempre resulta em 0.
     * @return null
     */
    public function testCastingStringInt()
    {
        $name = 'Someone';
        $this->assertEquals(0, (int) $name);
    }

    /**
     * The testCastingStringArray method verifica resultado de conversão de strings para array.
     * Verifica-se que casting de strings para arrays resultam sempre em índice numérico, tendo
     * como valor a literal string.
     */
    public function testCastingStringArray()
    {
        $name = 'Thiago';
        $newSet = (array) $name;
        // print_r($newSet);
        $this->assertArrayNotHasKey('name', $newSet); // verifica-se que índice numérico é criado, e não associativo
        $this->assertContains('Thiago', $newSet); // verifica que existe elemento com valor passado
    }

    /**
     * The testCastingArrayString method implementa cast de array para string e observa-se que tal cast (ou conversão)
     * não é possível, gerando essa uma exceção. No exemplo à seguir, como a exceção é gerada numa classe de teste,
     * a exeção esperada deve ser PHPUnit_Frameworkd_Error, não funcionando a mera Exception.
     *
     * @expectedException PHPUnit_Framework_Error
     * @expectedExceptionMessage Array to string conversion
     * @return null
     */
    public function testCastingArrayString()
    {
        $set = ['name'=>'Arnold', 'Someone'];
        $string = (string) $set;
    }

    /**
     * The testCastingArrayObj method verifica resultado de converção do tipo array, para tipo
     * object.
     */
    public function testCastingArrayObj()
    {
        $set = ['food' => 'mingal',  // será convertido para propriedade food
        'notThisWay',
        'orThis']; // não poderá ser acessado, já que não tem índice
        $objSet = (object) $set; // realiza conversão
        // print_r($objSet);

        $this->assertEquals('mingal', $objSet->food);
        // $this->assert('notThisWay', $objSet->{'0'}); // não funciona, portando, índices numéricos não podem ser recuperados num cast desse tipo
        // $this->assertEquals('orThis', $objSet->{'1'}); // mesmo resultado da expressão supra-citada
    }

    /**
     * The testCastingObjArray method
     * @return null
     */
    public function testCastingObjArray()
    {
        $obj = new \stdClass(); // cria novo objeto
        $obj->prop1 = 'Prop1 value';
        $obj->prop2 = 'Prop2 value'; // atribui propriedade e valor da mesma

        $arr = (array) $obj; // faz cast de objeto para array
        $this->assertArrayHasKey('prop1', $arr); // verifica se array de cast possui índice com nome da propriedade
        $this->assertContains('Prop1 value', $arr['prop1']); // verifica-se se array recebeu valor da propriedade como valor do elemento
    }
}
