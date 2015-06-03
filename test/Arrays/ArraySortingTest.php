<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage Test\Arrays
 */
namespace Test\Arrays;

/**
 * Classe ArraySortingTest - Classe testa funções de ordenação de arrays, do PHP. Ao todo são 11 funções
 * de ordenação disponíveis. Algumas delas possuem flags, tonando-se assim esse número um pouco mais
 * elevado.
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group Arrays
 * @group Arrays/ArraySortingTest
 */
class ArraySortingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Propriedade armazena array de teste
     * @var array $localSet Array de teste
     */
    protected $localSet;

    /**
     * Método sobrescrito da classe herdada. Aqui está meramente reatribuíndo os valores do
     * array de teste.
     * @return null
     */
    public function setUp()
    {
        $this->localSet = [
        'session1'=>'book1.pdf',
        'session2' => 'book2.pdf',
        'session11'=> 'book11.pdf'
        ];
    }

    /**
     * Método sobrescrito da classe herdada. Está limpando o valor alocado em memória para
     * a propriedade.
     * @return null
     */
    public function tearDown()
    {
        $this->localSet = null;
    }

    /**
     * Método implementa função sort().
     * Quando aplicamos a função sort() a um array, o mesmo será ordenado segundo os seus valores
     * e não serão preservadas as ordens dos índices do array e transformará os índices
     * associativos em numéricos. A função sort(), por padrão, não ordena eficientemente valores
     * alfanuméricos.
     *
     * A função sort(), porém, aceita um segundo parâmetro opcional, tendo esse um conjunto de constantes
     * globais, especialmente imlementadas para as possíveis ordenações
     * mais exigente. As constantes disponíveis, são:
     *
     * SORT_REGULAR - funcionalidade padrão, não implementa nada que difere da abordagem convencional.
     * SORT_NUMERIC - converte cada elemento em um valor numérico, para propósito de ordenamento;
     * SORT_STRING - compara os elementos como strings;
     * SORT_LOCALE_STRING - compara os elementos como strings, baseado na localização, configurável com a função setLocale();
     * SORT_NATURAL - compara os elementos como strings, usando a ordenação natural, assim como ocorre na função natsort();
     * SORT_FLAG_CASE - quando combinada às flags SORT_STRING ou SORT_NATURAL, compara os elementos em case insensitive;
     *
     * @return null
     */
    public function testSort()
    {
        /* COMPORTAMENTO PADRÃO */
        sort($this->localSet);
        // print_r($this->localSet); // verifica que os índices associativos foram substituídos por numéricos
        $this->assertArrayNotHasKey('session1', $this->localSet); // verifica-se que índice associativo não foi preservado
        $this->assertEquals('book2.pdf', $this->localSet[2]); // verifica-se que valores alfanuméricos não foram corretamente ordenados
    }

    /**
     * The testSortNatural method implementa função sort(), porém, com o uso da flag SORT_NATURAL, que ordena os valores do array
     * de forma mais eficiente, valores alfanuméricos agora são ordenados de forma natural.
     * @return null
     */
    public function testSortNatural()
    {
        sort($this->localSet, SORT_NATURAL); // submete propriedade a ordenação de valores de forma natural - eficiente para valores alfa-numéricos
        // print_r($this->localSet); // verifica ordenação
        $this->assertArrayNotHasKey('session1', $this->localSet); // verifica-se que índice associativo não foi preservado
        end($this->localSet); // coloca ponteiro do array no último elemento
        $this->assertEquals('book11.pdf', current($this->localSet)); // verifica-se que, dessa vez, os valores alfanuméricos foram corretamente ordenados.
    }

    /**
     * The testSortString method
     * @return null
     */
    public function testSortString()
    {
        sort($this->localSet, SORT_STRING);
        // print_r($this->localSet); // observa-se que valores alfanuméricos não são eficientemente ordenados
        $this->assertArrayNotHasKey('session1', $this->localSet); // verificap-se que índices não são presenvados
        end($this->localSet); // coloca ponteiro do array no último elemento
        $this->assertEquals('book2.pdf', current($this->localSet)); // verifica-se valores alfanuméricos não são eficientemente ordenados
    }

    /**
     * Método atua de forma semelhante à função sort(), diferenciando-se na ordem em que se dispõe
     * os elementos, fazendo-o de forma reversa.
     * @return null
     */
    public function testRSort()
    {
        rsort($this->localSet);
        //print_r($this->localSet); // verifica que os índices associativos foram substituídos por numéricos
        $this->assertArrayHasKey(1, $this->localSet); // verifica-se se índice associativo não foi preservado
        $this->assertContains('book2.pdf', $this->localSet[0]); // verifica-se que valores alfanuméricos não foram corretamente ordenados
    }

    /**
     * Método implementa ordenação de forma ascendente aos valores dos elementos do array
     * passado, função preserva valores dos índices, sejam esses numéricos ou associativos,
     * porém, não ordena corretamente valores alfa numéricos, não substituindo, assim, a função
     * natsort().
     * @return null
     */
    public function testASort()
    {
        asort($this->localSet);
        //print_r($this->localSet);
        $this->assertArrayHasKey('session1', $this->localSet); // verifica-se que índice associativo foi presenvado
        end($this->localSet); // posiciona ponteiro do array no último elemento
        $this->assertContains('book2.pdf', current($this->localSet)); // verifica-se que valores alfanuméricos não foram corretamente ordenados
    }

    /**
     * The testARSort method implementa função arsort(), que atua exatamente da mesma forma da função asort(), supra testada,
     * porém, realiza ordenação de forma descendente.
     * @return null
     */
    public function testARSort()
    {
        arsort($this->localSet);
        // print_r($this->localSet);
        $this->assertArrayHasKey('session1', $this->localSet); // verifica se índice associativo foi presenvado
        end($this->localSet); // coloca ponteiro do array no último elemento
        $this->assertContains('book1.pdf', current($this->localSet)); // verifica se último valor é o valor esperado.
    }

    /**
     * Método testa atribuição de array à função ksort() do PHP. Verifica-se que apesar
     * de ordenar os índices e manter a associação ao valor, não ordenando assim os valores,
     * mas tão somente os índices, a função ksort() não ordena de forma eficiente índices de
     * de nomes alfanuméricos, o índice book2.pdf é colocado posterior ao índice book12.pdf.
     * O var_dump mostra a atuação da função em um array associativo.
     * @return null
     */
    public function testKSort()
    {
        ksort($this->localSet);
        end($this->localSet); // coloca ponteiro no elemento de última posição, para verificação da ordenação
        //print_r($this->localSet);
        $this->assertContains('book2.pdf', current($this->localSet));
    }

    /**
     * The testKRSort method implementa uso da função krsort() à propriedade de tipo array $localSet.
     * A função krsort() atua exatamente como a função ksort(), porém, realiza ordenação de forma descendente.
     * @return null
     */
    public function testKRSort()
    {
        krsort($this->localSet); // submete array à função krsort()
        end($this->localSet); // coloca ponteiro no elemento de última posição, para verificação da ordenação
        // print_r($this->localSet);
        $this->assertContains('book1.pdf', current($this->localSet));
    }

    /**
     * Método testa implementação de função natsort() do PHP.
     * Quando ordenamos os valores alfanúmericos de um array, pela função padrão (sort())
     * o ordenamento não é feito realmente da forma que se espera, o var dump da função
     * sort(), abaixo, mostra como os valores são ordenados, porém quando utilizamos a
     * função natsort() o ordenamento é o que mais comumente se espera. É importante
     * ressaltar que os índices são preservados na função nartsort(), somente a ordem
     * dos elementos é alterada.
     * @return null
     */
    public function testNatsort()
    {
        natsort($this->localSet);
        //print_r($this->localSet); // aqui vemos a ordenação alfanumérica acontecer
        end($this->localSet); // coloca ponteiro no último elemento do array
        $this->assertEquals('book11.pdf', current($this->localSet)); // verifica-se o valor do elemento
    }

    /**
     * Método implementa função array_reverse() do PHP. Função inverte ordem dos valores, sendo, sendo o último
     * elemento colocado em primeiro e vice-versa. Para índices numéricos ocorre perda de relação índice/chave,
     * porém, índices associativos são mantidos.
     * @return null
     */
    public function testArrayReverse()
    {
        $localSet = ['abacate', // abacate é índice 0
        '2nd'=>'book2.png',
        'banana', // banana é índice 1
        '1st'=>'book1.png',
        '11th'=>'book11.png'];

        $res = array_reverse($localSet); // atribui função ao array
        //print_r($res);
        $this->assertEquals('banana', $res[0]); // verifica-se que alterou-se o índice numérico, agora banana é índice 0
        $this->assertEquals('abacate', $res[1]); // verifica-se que alterou-se o índice numérico, agora abacate é índice 1
    }

    /**
     * The testShuffle method tests the PHP shuffle() function. This function shuffles the elements in an
     * array, this function don't preserve the array keys. New numeric keys will be applied to the elements
     * of the array. You can see that the shuffle() function randomize the order of array elements.
     * The value of the indexes is not testable, cause it was randomized, but we can see that the associative
     * indexes was lost.
     * @return null
     */
    public function testShuffle()
    {
        shuffle($this->localSet);
        //print_r($this->localSet);
        $this->assertArrayNotHasKey('1st', $this->localSet); // associative array indexes was lost
    }
}
