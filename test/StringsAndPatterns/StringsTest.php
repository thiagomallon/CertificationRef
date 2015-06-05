<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage Test\StringsAndPatterns
 */
namespace Test\StringsAndPatterns;

/**
 * Class StringsTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group StringsAndPatterns
 * @group StringsAndPatterns/StringsTest
 */
class StringsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * The testStrtrImplementing method
     * @return null
     */
    public function testStrtrImplementing()
    {
        $acentos = "João Simões Alças e Bonés"; // string a ser tratada
        $tst = ['ã' => 'a', 'õ' => 'o', 'ç' => 'c', 'é' => 'e']; // substituições a serem atribuídas
        $res = strtr($acentos, $tst); // implementa substituição dos caracateres
        $this->assertEquals('Joao Simoes Alcas e Bones', $res); // verifica se string de resultado é a mesma
    }

    /**
     * The testStringAsArray method
     * @return null
     */
    public function testStringAsArray()
    {
        $string = 'This is a string literal';
        $this->assertEquals('h', $string[1]);
    }

    /**
     * The testStrcmpImplementing method
     * @return null
     */
    public function testStrcmpImplementing()
    {
        $string = 'Astronaut'; // string a ser comparada
        $this->assertEquals(5, strcmp($string, 'Astr')); // sobram 5 letras
        $this->assertEquals(-1, strcmp($string, 'Astronauts')); // ficou faltando uma letra
        $this->assertEquals(-12, strcmp($string, 'Moon')); // sobram 5 letras
        $this->assertEquals(-45, strcmp($string, 'naut')); // sobram 5 letras
    }

    /**
     * The testStrncasecmpImplementing method implementa uso da função strncasecmp, que compara duas
     * strings sem atribuir-se case-sensitivity
     * @return null
     */
    public function testStrncasecmpImplementing()
    {
        $string = 'Astronaut'; // string a ser comparada
        $this->assertEquals(0, strncasecmp($string, 'Astr', 4)); // compara
        $this->assertGreaterThan(1, strncasecmp($string, 'as', 4));
        $this->assertLessThan(0, strncasecmp($string, 'astronauts', 11));
    }

    /**
     * The testStrcasecmpImplementing method
     * @return null
     */
    public function testStrcasecmpImplementing()
    {
        $string = 'Astronaut'; // string a ser comparada
        $this->assertEquals(5, strcasecmp($string, 'Astr')); // compara
        $this->assertGreaterThan(1, strcasecmp($string, 'As'));
        $this->assertLessThan(0, strcasecmp($string, 'Astronauts'));
    }

    /**
     * The testStrstrImplementing method
     * @return null
     */
    public function testStrstrImplementing()
    {
        $email = 'test@test.com'; // string de e-mail
        // verifica se existe @ na string passada e retorna o restante da string à partir da posição de @, ou false, caso não encontre @
        $this->assertEquals('@test.com', strstr($email, '@'));
        $this->assertEquals('test', strstr($email, '@', true));
    }

    /**
     * The testStrspnImplementing method
     * @return null
     */
    public function testStrspnImplementing()
    {
        $string = 'abc123abc456abc';
        $mask = 'abc';
        $this->assertEquals(3, strspn($string, $mask, 0));
        $this->assertEquals(3, strspn($string, $mask, 0, 14));
    }

    /**
     * The testFormattingNumbers method
     * @return null
     */
    public function testFormattingNumbers()
    {
        $number = '100000000.698';
        $this->assertEquals('100 000 000,698', number_format($number, 3, ",", " "));
    }

    /**
     * The testSprintfImplementing method
     * @return null
     */
    public function testSprintfImplementing()
    {
        ${24} = 24; // don't set the identifiers this way - NEVER!!... ;)
        $res = sprintf("%s%b", '24 equals ', ${24}); // função retorna valor formatado
        $this->assertEquals('24 equals 11000', $res); // verifica-se se resultado é o esperado

        $chara = 97; // para conversão para caractere
        $res = sprintf("%s%c", '97 equals ', $chara); // função retorna valor formatado
        $this->assertEquals('97 equals a', $res); // verifica-se se resultado é o esperado
    }

    /**
     * The testStripTags method implementa a função strip_tags() do PHP, que retira quaisquer tags html e/ou xml
     * da string passada. A função pode receber dois parâmetros, sendo o primeiro a string a ser tratada e o segundo
     * parâmetro, por sua vez opcional, é usado para declarar as tags as quais não deseja-se que sejam retiradas.
     * @return null
     */
    public function testStripTags()
    {
        $string = '<h1>Hi and welcome!</h1> We are a <strong>robot factory</strong>'; // string com tags
        $this->assertEquals('Hi and welcome! We are a robot factory', strip_tags($string)); // todas as tags são retiradas
        // abaixo informamos que as tags <strong></strong> devem ser preservadas
        $this->assertEquals('Hi and welcome! We are a <strong>robot factory</strong>', strip_tags($string, '<strong></strong>'));
    }

    /**
     * The testStrrev method implementa função strrev(), que inverte a string passada e retorna o valor.
     * @return null
     */
    public function testStrrev()
    {
        $string = strrev('Testing stuff'); // função inverte string passada
        // print_r($string);
        $this->assertEquals('ffuts gnitseT', $string); // verifica inversão
    }

    /**
     * The testExplode method implementa uso da função explode, que transforma string em um array.
     * A função recebe o delimitador como primeiro parâmetro, a string a ser transformada no segundo
     * e o terceiro parâmetro, dessa vez, não obrigatório é utilizado para delimitar-se o número máximo
     * de elementos que poderão ser criados.
     * A função não altera o dado original, mas retorna array de string tratada.
     * @return null
     */
    public function testExplode()
    {
        $string = 'first, second, third, fourth';
        $res = explode(', ', $string);
        $this->assertCount(4, $res);
        $this->assertEquals('second', $res[1]);
    }

    /**
     * The testImplode method implementa uso da função implode, que transforma um array em uma string.
     * O primeiro parâmetro é a string de junção, ou seja, o que será colocado entre um elemento e outro, na
     * string gerada e o segundo parâmetro é o array a ser transformado. A função não altera o dado original,
     * mas retorna a string recém criada.
     * @return null
     */
    public function testImplode()
    {
        $set = ['first', 'second', 'third', 'fourth']; // array de elementos
        $res = implode(', ', $set); // transforma array em string
        $this->assertEquals('first, second, third, fourth', $res); // verifica string gerada
    }

    /**
     * The testStrtokImplement method
     * @return null
     */
    public function testStrtokImplement()
    {
        $this->markTestIncomplete('Incomplete');
        $string = "Hi\nHow are you?\nWelcome to our website";
        $res = strtok($string, "\n");
        // var_dump($res);
    }
}
