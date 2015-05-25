<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage Test\PHPBasics
 */
namespace Test\PHPBasics;

/**
 * Class PeculiarVariablesNamingTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group PHPBasics
 * @group PHPBasics/PeculiarVariablesNamingTest
 */
class PeculiarVariablesNamingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The testNumericVariableIdentifier method verifica possibilidade de nomear-se variáveis
     * iniciando-se seu identificador com valores numéricos.
     */
    public function testNumericVariableIdentifier()
    {
        ${123} = 'identificador numérico'; // cria-se variável com identificador numérico
        $this->assertContains('numérico', ${123}); // verifica-se que tal abordagem é perfeitamente possível

        ${'15'} = 'identificador é string numérica'; // cria-se variável com identificador do tipo string, porém, numérico
        $this->assertContains('string numérica', ${'15'}); // verifica-se possibilitade de aplicação da abordagem
    }

    /**
     * The testWeLovePeculiarity method
     */
    public function testWeLovePeculiarity()
    {
        $name = '123';
        $$name = '456'; // atribui-se valor 456 à variável 123

        $this->assertEquals('456', ${'123'});
    }
}
