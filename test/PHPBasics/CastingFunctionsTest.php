<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage Test\PHPBasics
 */
namespace Test\PHPBasics;

/**
 * Class CastingFunctionsTest testa funções especialistas em realizar casting. Existem 5 funções para
 * que realizam tal tarefa, sendo elas:
 *
 * strval(), intval(), floatval(), doubleval() (alias da floatval, boolval()
 *
 * Existe também uma função especializa em casting, na qual você mesmo define o tipo de conversão,
 * que é a função:
 *
 * settype()
 *
 * A função supra-citada permite conversão para todos os tipos escalares, bem como tipos compostos e null,
 * porém, como se espera, não realiza a conversão para resource, sendo essa uma conversão impossível, pela
 * quantidade de resources que podem existir, porém, como na abordagem convencional de cast, é possível
 * converter um tipo resource para outro tipo.
 *
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group PHPBasics
 * @group PHPBasics/CastingFunctionsTest
 */
class CastingFunctionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The testIntVal method verifica possíveis retornos da função intval() do PHP.
     *
     * Verifica-se comportamento padrão na função. Quando converte-se string de valor escencialmente
     * numérico, o valor numérico resultante é a representação exata do valor numérico passado,
     * porém, caso se atribua valor alfanumérico que inicie com string, o valor convertido será 0,
     * caso, porém, alfanumérico iniciando com números, serão convertidos os números até a ocorrência
     * de caractere, e então a conversão é finalizada.
     */
    public function testIntVal()
    {
        $numeric = '123';
        $number = intval($numeric);

        $numericB = '123asdf';
        $numberB = intval($numericB);

        $numericC = 'asdf123';
        $numberC = intval($numericC);

        $this->assertInternalType('int', $number);
        $this->assertEquals(123, $number);

        $this->assertInternalType('int', $numberB);
        $this->assertEquals(123, $numberB);

        $this->assertInternalType('int', $numberC);
        $this->assertEquals(0, $numberC);
    }
}
