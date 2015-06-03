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
}
