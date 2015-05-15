<?php

/**
 * Created by Thiago Mallon
 */

 /**
  * @package Test\OOProgramming
  */
namespace Test\OOProgramming;

/**
 * Classe UNSerializingTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group OOProgramming
 * @group OOProgramming/UNSerializingTest
 */
class UNSerializingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Método implementa função serializa() e unserialize() do PHP. Função serializa transforma objeto em
     * string única, para fins de armazenamento ou transporte, util para quando existe necessidade de armazenamento
     * de um objeto inteiro, com os valores atribuídos às propriedades. A função serializa transforma o objeto em uma
     * string que representa o objeto. Futuramente, pode-se utilizar a função unserialize, para transformar essa string
     * no objeto novamente, lembrando-se que todas os valores atrubuídos às propriedades do objeto, após seu instanciamento
     * serão mantidas nas chamadas à serialize() e unserialize().
     * @return void
     * @covers App\OOProgramming\Daughter::__construct
     */
    public function testSerialization()
    {
        /* oh today I'm a bit lazy */
        $_daughter = new \App\OOProgramming\Daughter;

        $_daughter->setName('PreSerialize'); // atribui-se valor à propriedade $name
        $daughSrz = serialize($_daughter); // serializa-se o objeto
        //print_r($daughSrz); // opção para verificar-se string gerada (consegue-se notar a ocorrência do valor atribuído à propriedade $name)
        $daughUsrz = unserialize($daughSrz); // deserializa o objeto
        //print_r($daughUsrz);
        $this->assertEquals('PreSerialize', $daughUsrz->getName()); /* observa-se que ainda é possível realiza chamada à métodos e a
                                                                     * presente chamada retornou o valor atribuído à propriedade antes de sua serialização,
                                                                     * concluindo-se, assim, que a serialização mantém todas as características do objeto.
                                                                     */
        unset($_daughter);
    }
}
