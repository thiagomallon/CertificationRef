<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage Test\PHPBasics
 */
namespace Test\PHPBasics;

/**
 * Class VariableVariablesTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group PHPBasics
 * @group PHPBasics/VariableVariablesTest
 */
class VariableVariablesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The testAttribution method testa atribuição de valor e criação de variável, pelo valor
     * de uma mesma.
     *
     * No exemplo abaixo, cria-se uma variável $fast, através da expressão $$name, que cria, então
     * uma variável com o identificador que contém no valor da variável $name. Observe que na mesma
     * expressão estamos atribuíndo valor à propriedade $fast.
     */
    public function testAttribution()
    {
        $name = 'fast';
        $$name = 'But not furious - soft! But competent. Ever!';

        $this->assertContains('competent', $fast); // verifica-se que variável foi criada e valor desejado, atribuído
    }

    /**
     * The testAnotherAttribution method
     * Assim como no método anterior, no presente utiliza-se o conceito de variáveis variáveis, que
     * acessa o valor da variável referenciada, criando-se outra variável e atribuíndo valor à mesma.
     */
    public function testAnotherAttribution()
    {
        $fast = 'growing';
        $name = 'fast';
        $$$name = 'constantly'; // atribui-se/cria-se growing com valor 'constantly'

        $this->assertEquals('constantly', $growing); // operação realizada com sucesso
    }

    /**
     * Método verifica atuação do conceito de variáveis variáveis, junto ao conceito de identificadores
     * numéricos de variáveis
     */
    public function testYetAnotherOne()
    {
        $name = '123';        
        $$name = '456'; // atribui-se valor 456 à variável 123        

        $this->assertEquals('456', ${'123'});
    }
}
