<?php

/**
 * Created by Thiago Mallon
 */

 /**
  * @subpackage Test\StringsAndPatters
  */
 namespace Test\StringsAndPatters;

/**
 * Classe PregMatchTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group StringsAndPatters
 * @group StringsAndPatters/PregMatchTest
 */
class PregMatchTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Protected property stores object instance
     * @var string $text
     */
    protected $text;
    
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $this->text = '#include "LPC17xx.h" // biblioteca que implementa padrão CMSIS'.PHP_EOL.
        '#include <cr_section_macros.h> // arquivos que são incluídos por padrão no arquivo main'.PHP_EOL.
        '#include <NXP/crp.h> // arquivo implementa proteção de código à memória flash'.PHP_EOL.
        'int init(void);'.PHP_EOL.
        'void setStatus(void);'.PHP_EOL.
        'char treatString(char*);'.PHP_EOL;
    }
    
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        unset($this->text);
    }

    /**
     * The testPregMatch method implementa uso da função preg_match(), bem como do recurso chamado backreference,
     * que tem por objetivo buscar novamente, em dado local do padrão, por um dos padrões anteriormente
     * encontrados. A função preg_match() busca por uma linha, retornará a primeira ocorrência dos padrões,
     * diferentemente da função preg_match_all(), que veremos mais a diante.
     * @return null
     */
    public function testPregMatch()
    {
        /* implementa-se o recurso backreference. No padrão abaixo, solicitamos que o backreference esteja procurando
        novamente o primeiro grupo encontrado, porém, em um posicionamento diferente na string */
        preg_match('/^(void)(\s\w+)(\()(\1)(\)\;)/m', $this->text, $matched);
        $this->assertEquals('void', $matched[1]); // verificamos se o primeiro grupo confere
        $this->assertEquals(' setStatus', $matched[2]); // verificamos se o segundo grupo confere
        $this->assertEquals('(void);', $matched[3].$matched[4].$matched[5]); //  verificamos a junção do terceiro, quarto e quinto grupo
    }

    /**
     * The testPregMatchAll method implementa busca de padrão na string, bem como implementa conceito de prefixo
     * na busca. A função preg_match_all() busca por padrões com uma abordagem global. Sabe-se que o PHP não possui
     * \g, pois para buscas globais, usa-se o preg_match_all();
     * @return null
     */
    public function testPregMatchAll()
    {
        preg_match_all('/^(?:\#\w+\s)(?<includes>.*?\s)(?<comments>\/\/.*)?/m', $this->text, $matched);
        $this->assertCount(3, $matched['includes']); // atribuíndo-se prefixos, a recuperação dos dados se torna mais fácil
        $this->assertCount(3, $matched[1]); // incluindo-se prefixos, não exclui-se ou substitui-se o agrupamento numéricamente indexado primariamente criado.
        $this->assertEquals($matched['includes'], $matched[1]); // verifica-se igualdade entre os arrays
        $this->assertSame($matched['includes'], $matched[1]); // idênticos
        $this->assertCount(3, $matched['comments']); // certifica-se que os comentários foram capturados

        $this->assertEquals('<cr_section_macros.h> ', $matched['includes'][1]); // verifica se string esperada foi capturada
        $this->assertEquals('// arquivos que são incluídos por padrão no arquivo main', $matched['comments'][1]); // verifica se string esperada foi capturada
        // print_r($matched);
    }

    /**
     * The testPregReplace method implementa a função preg_replace(), que recebe o padrão e aplica substituições
     * no subject passado, não alterando esse, mas retornando uma nova string com as devidas substituições. Diferentemente das
     * funções preg_match() e preg_match_all(), a função preg_replace() não retorna um array, mas sim a string com as substituições
     * aplicadas.
     * @return null
     */
    public function testPregReplace()
    {
        $this->text = preg_replace('/^(\#\w+?\s)/', '<span style="color: pink;">$1</span>', $this->text); // atribui padrão à string
        $this->assertContains('<span style="color: pink;">#include </span>', $this->text); // verifica se foi aplicada substituição
        $this->assertRegExp('/^(\#\w+?\s)/m', $this->text);
    }

    /**
     * The testPregSplit method faz uso da função preg_split(), que implementa quebra de string, de acordo com o padrão
     * setado. No exemplo abaixo, a string é quebrada nos finais de linha, então a função retorna um array com cada linha
     * em uma posição do mesmo.
     * @return null
     */
    public function testPregSplit()
    {
        $this->text = preg_split("/".PHP_EOL."/", $this->text);
        //print_r($this->text);
        $this->assertEquals('int init(void);', $this->text[3]);
    }
}
