<?php
/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-05-05 at 12:12:07.
 */

/**
 * @subpackage Test\Arrays
 */
namespace Test\Arrays;

/**
 * Classe de testes do objeto Arrays
 * Observações:
 *
 * PHP provides a great amount of flexibility in how numeric keys can be
 * assigned to arrays: numeric keys can be any integer number (both negative
 * and positive), and they don’t need to be sequential, so a large gap can exist
 * between the indices of two consecutive values without the need to create
 * intermediate values to cover every possible key in between. Moreover, the
 * keys of an array do not determine the order of its elements—as we saw earlier
 * when we created an enumerative array with keys that were out of natural
 * order
 *
 * When an element is added to an array without specifying a key, PHP
 * automatically assigns a numeric one that is equal to the greatest numeric key
 * already in existence in the array, plus one
 *
 * Note that array keys are case-sensitive, but type insensitive. Thus, the key
 * 'A' is different from the key 'a' , but the keys '1' and 1 are the same.
 * However, the conversion is only applied if a string key contains the traditional
 * decimal representation of a number; thus, for example, the key '01' is not
 * the same as the key 1 . Attempting to use a float as a key will convert it to an
 * integer key, so that '12.5' becomes '12' . Using boolean values of true and
 * false as keys will cast them to 1 and 0 respectively, while using NULL will
 * actually cause them to be stored under the empty string "" . Finally, arrays
 * and objects cannot be used as keys.
 *
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group Arrays
 * @group Arrays/ArraysTest
 */
class ArraysTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Propriedade consiste-se em um array de elementos variados, para fins de testes.
     * @var array $setOfStuff
     */
    protected $setOfStuff;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $this->setOfStuff = [
        "1st"=>"first",
        2,
        "2nd"=>"second",
        "3rd"=>"Third",
        "wanna" => "want_to",
        "dont" => "do_not",
        ];
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        unset($this->setOfStuff);
    }

    /**
     * Método verifica forma de iteração em inserção de elementos em um array. Observa-se
     * que o primeiro índice numérico é 4, porém, somente ele e o índice 0 foram explicitamente
     * declarados, o outro índice numérico, que possui valor 'um', não foi explicitamente declarado,
     * porém, verifica-se que o índice criado para ele, é o 5, uma vez que foi declarado o índice
     * 4. Sendo assim conclui-se que o PHP não se importa com posições de indexação vazias, ele
     * sempre criará um índice incrementando um ao índice de maior posição.
     * @return null
     */
    public function testInsertion()
    {
        $localSet = ['1st'=>'first',
        4=>'four',
        0=>'zero',
        'um'];
        //print_r($localSet);
        $this->assertEquals('um', $localSet[5]); // índice atribuído foi o 5 e não 1
    }

    /**
     * The testNegativeIndexes method
     * @return null
     */
    public function testNegativeIndexes()
    {
        $localSet = [-1=>'First negative', -2=>'Second negative', -3=>'Third negative'];
        // print_r($localSet);
        $this->assertArrayHasKey(-3, $localSet);
        $this->assertArrayHasKey(-2, $localSet);
    }

    /**
     * Método testa função in_array() do PHP. Função verifica se existe dado
     * valor em qualquer um dos índices do array passado e retorna true caso
     * ocorra.
     * @return null
     */
    public function testInArray()
    {
        $stuffResult = in_array("second", $this->setOfStuff);
        $this->assertTrue($stuffResult);
    }

    /**
     * Método testa função array_keys do PHP. Quando um array é passado à função,
     * a mesma retornará um novo array, com os índices do array passado preenchendo os valores
     * e os índices, dessa vez, númericamente indexados.
     * @return null
     */
    public function testArrayKeys()
    {
        $indexesOfStuff = array_keys($this->setOfStuff);
        $this->assertArrayNotHasKey("1st", $indexesOfStuff);
    }

    /**
     * Método testa função array_key_exists() do PHP. Função verifica se existe
     * dado índice no array e retorna true caso ocorra. Essa função é útil e deve ser utilizada
     * quando a informação que se deseja é saber se um dado elemento existe. Veja os resultados
     * não satisfatórios que uma abordagem com isset() poderia trazer:
     *
     * $a = ['1st'=>null, '2nd'='second'];
     * isset($a['1st']); // false
     *
     * Verifica-se que mesmo o índice '1st' existindo, o resultado é false, isso pq o que está
     * sendo comparado é o valor do elemento e não seu índice. Por isso utilizar a função
     * array_key_exists() é a abordagem correta e a única satisfatória.
     *
     * Por sua vez, se quisermos saber se um elemento (valor) existe em um dado array,
     * a função para tal tarefa á a in_array();
     *
     * @return null
     */
    public function testArrayKeyExists()
    {
        $this->assertTrue(array_key_exists("3rd", $this->setOfStuff));
    }

    /**
     * Método testa função array_values do PHP. Quando um array é passado à função
     * a mesma devolve um novo array, com os valores do antigo, porém, com novos índices,
     * dessa vez numericamente indexados.
     * @return null
     */
    public function testArrayValues()
    {
        $valuesOfStuffs = array_values($this->setOfStuff);
        $this->assertContains('do_not', $valuesOfStuffs);
    }

    /**
     * Método testa função array_flip do PHP. Função recebe um array e devolve o mesmo com índices
     * e valores invertidos, ou seja, índice no lugar do valor e vice-versa. A função respeira índices
     * associativos.
     * @return null
     */
    public function testArrayFlip()
    {
        $invertedStuf = array_flip($this->setOfStuff);
        $this->assertArrayHasKey('want_to', $invertedStuf);
    }

    /**
     * Método testa implementação da função array_combine() do PHP. Verifica-se que a função combina
     * dois arrays, através da seguinte abordagem: Os valores do array do primeiro parâmetro serão
     * as chaves dos valores do array do segundo parâmetro, sendo assim uma combinação dos valores dos
     * dois arrays, porém, os valores do primeiro sendo convertidos em índices. A função retorna um
     * terceiro array com a implementação. É importante ressaltar que ambos arrays a serem combinados,
     * devem ter exatamente o mesmo número de elementos, do contrário um warning é gerado.
     * @return null
     */
    public function testArrayCombine()
    {
        $localSetA = ['1st', '2nd', '3rd'];
        $localSetB = ['first', 'second', 'third'];
        $res = array_combine($localSetA, $localSetB);
        //var_dump($res);
        $this->assertArrayHasKey('1st', $res); // verifica se existe o índice '1st'
        $this->assertArrayHasKey('3rd', $res); // verifica se existe o índice '2nd'
        $this->assertContains('second', $res); // verifica se existe o valor 'second' em qualquer dos elementos
    }

    /**
     * Método implementa função array_merge() do PHP. A função faz, como o nome diz, um merge entre
     * arrays. A função não espera um valor máximo de arrays recebidos via parâmetro, porém, deve-se
     * passar o mínimo de 2 arrays, em sua chamada. A função retorna um array contendo todos os elementos
     * existentes em todos os arrays, porém, caso ache-se duplicidade em índices associativos, e tão somente
     * nos associativos, pois a duplicidade de índices numéricos é contornata e o elemento é alocado em outro
     * índice numérico, ou seja, caso exista o mesmo índice ASSOCIATIVO em dois arrays, o valor que prevalecerá,
     * será o valor do último array, na ordem de argumentos passados à função. Observe o print_r()
     * do array de retorno.
     * @return null
     */
    public function testArrayMerge()
    {
        $localSetA = ['cabeça'=>'oculos', 'braço', 'perna','mão'];
        $localSetB = ['cabeça'=>'boné', 16, 1 => 'vinte']; // verifica-se que os índices numéricos são realocados e não sobrescritos
        $res = array_merge($localSetA, $localSetB);
        //print_r($res);
        $this->assertCount(6, $res); // todos os arrays são mantidos, somente o elemento de índice cabeça, que, por ser associativo, não recebe realocamento, e tem valor final 'boné'
        $this->assertEquals('boné', $res['cabeça']); // o índice 'cabeça' se repete nos arrays, sendo assim, o último valor do último array será o valor atribuído ao índice
    }

    /**
     * Método implementa chamada à função array_replace() do PHP. Função, diferentemente da função array_merge(),
     * vista no método acima, implementa substituição tanto de índices associativos, quanto de índices numéricos.
     * @return null
     */
    public function testArrayReplace()
    {
        $localSetA = ['cabeça'=>'oculos', 'braço', 'perna','mão', 12=>'doze'];
        $localSetB = ['cabeça'=>'boné', 16, 1 => 'vinte'];
        $res = array_replace($localSetA, $localSetB);
        // print_r($res);
        $this->assertCount(5, $res); // observa-se que o array de retorno possui agora 5 elementos.
        $this->assertEquals('boné', $res['cabeça']); // observa-se que o valor do índice do segundo array, substituiu o valor do índice do primeiro
    }

    /**
     * Método implementa função array_unique() do PHP. Função retira duplicidade de valores de índices do array passado.
     * Caso ocorra, em um array numericamente indexado, em seus índices 2 e 10, o mesmo valor de 'cinco'. Ex: [2 => 'cinco', 10 => 'cinco'];
     * Então, depois de o array ser atribuído à função array_unique(), somente o índice 2 aparecerá, já que a função elimina as demais duplicidades,
     * partindo da primeira ocorrência do valor.
     * Observa-se que independentemente do índice ser numérico ou associativo, a primeira ocorrência do valor é a que permanece, ela
     * e seu respectivo índice.
     * @return null
     */
    public function testArrayUnique()
    {
        $localSet = [
        'Macarrão' => 15,
        10 => 15,
        0 => 'aveia',
        'mingal' => 'aveia'];

        $res = array_unique($localSet);
        // print_r($res);
        $this->assertEquals(15, $res['Macarrão']); // tanto existe índice associativo, quando índice numérico para o valor 15, porém, o de índice associativo foi definido primeiro, portanto prevalece
        $this->assertEquals('aveia', $res[0]); // tanto existe índice associativo, quando índice numérico para o valor aveia, porém, o de índice numérico foi definido primeiro, portanto prevalece
    }

    /**
     * Método implementa chamada à função array_shift() do PHP. A função retira o primerio elemento do
     * array passado e retorna seu valor, deixando o array passado sem o primeiro elemento.
     * @return null
     */
    public function testArrayShift()
    {
        // faz contagem ao array, antes de atribuí-lo à função array_shift()
        $this->assertCount(6, $this->setOfStuff);

        // aplica array_shift() e armazena retorno
        $cutted = array_shift($this->setOfStuff);
        $this->assertEquals('first', $cutted); // verifica se rotorno da função é igual a valor do primeiro elemento
        $this->assertCount(5, $this->setOfStuff); // faz nova contagem para confirmação de retirada de um elemento (primeiro elemento).
        // print_r($this->setOfStuff); // verifica-se que, de fato, primeiro elemento não mais faz parte do array
    }

    /**
     * Método implementa atruição de um tipo array à função array_slice() do PHP.
     * Função tem capacidade de retornar parte do array. Em seu primeiro argumento recebe o parâmetro
     * a ser recortado, no segundo parâmetro especifica-se à partir de qual índice será feito o corte,
     * o terceiro parâmetro especifica até qual posição será o corte, o quarto parâmetro é usado para
     * solicitar ou não a reordenação do array. A função retorna o array recortado. Nota-se que quando
     * é atribuído um array associativo, os índices não são reordenados e refere-se aos índices com os
     * seus relativos numéricos e não a string associativa.
     * @return null
     */
    public function testArraySlice()
    {
        $res = array_slice($this->setOfStuff, 3, 5); // refere-se aos índices associativos, com seus relativos numéricos - não é aplicada reordenação de índices
        //print_r($res);
    }

    /**
     * Método retorna soma de todos os valores numéricos do array.
     * Observações: Quando um elemento possui valores alfanuméricos, a menos que esse valor
     * alfanumérico comece com representações numéricas ('345cdf') o elemento não será incluido
     * na soma, e também quando inicia com dígitos, obviamente que somente os dígitos serão
     * incluídos na soma.
     * @return null
     */
    public function testArraySum()
    {
        $localSet = [12,12,12]; // declara-se array com somente valores numéricos
        $this->assertEquals(36, array_sum($localSet)); // verifica-se o valor total

        $localSet[2] = 'abc12'; // atribui-se valor alfa-numérico (começando com letras) ao elemento 2
        $this->assertNotEquals(36, array_sum($localSet)); // agora não mais a soma é 36, já que foi encontrado elemento com valor que inicia com letra
        $this->assertEquals(24, array_sum($localSet)); // o valor da soma é 24, pois o elemento 2 foi excluído da soma

        $localSet[1] = '5abc'; // atribui-se valor alfa-numérico (iniciado com números) ao elemento 1
        $this->assertEquals(17, array_sum($localSet)); // Observa-se aqui que quando a soma do valor alfanumérico
    }

    /**
     * Método implementa teste à função array_count_values() do PHP.
     * Função conta quantas vezes um mesmo valor ocorre no array passado e retorna um outro array, com dodos os valores
     * e a quantidade de suas ocorrências. O Array possui então, os valores nos lugares dos índices e a quantidade de
     * ocorrência daquele valor, em seus valor. Observe o que se imprime na função print_r();
     * @return null
     */
    public function testArrayCountValues()
    {
        $this->setOfStuff[] = 'first'; // adiciona duplicidade
        $this->setOfStuff[] = 'first'; // adiciona triplicidade
        /* à partir desse momento, quando passarmos o array à função, o array de retorno terá um índice associativo 'first', com valor 3 */
        $res = array_count_values($this->setOfStuff);
        // print_r($res);
        $this->assertEquals(3, $res['first']);
    }

    /**
     * Método implementa função array_fill_keys() do PHP. A função recebe dois parâmetros, o primeiro é o
     * array e o segundo é o novo valor, que será atribuído à todos os elementos do array. A função transforma
     * os valores do array passado em chaves e atribui o segundo parâmetro recebido pela função como valor
     * à todos os novos índices. É importante lembrar que uma vez que existam valores duplicados, os mesmos serão
     * retirados, uma vez que os índices do array devem ser únicos. No array de exemplo abaixo, declaro dois valores
     * 'mingal', porém, array retornado da função array_fill_keys() possui apenas um índice 'mingal';
     * @return null
     */
    public function testArrayFillKeys()
    {
        $localSet = [
        'mingal',
        'mingal',
        'aveia',
        'banana'
        ];

        $res = array_fill_keys($localSet, 'mALLON');
        // print_r($res);
        $this->assertCount(3, $res);
    }

    /**
     * The testArrayFill method
     * @return null
     */
    public function testArrayFill()
    {
        $localSet[-1] = 'Chocoloko';
        // print_r($localSet);
    }

    /**
     * Método implementa função (ou melhor, construtor de linguagem list()). Função atribui
     * valor de dada posição à variável atribuída, seguindo-se a ordem de ocorrência. No exemplo
     * abaixo.
     * @return null
     */
    public function testList()
    {
        $localSet = ['1st',
        '2nd',
        '3rd' => 'third',  // esse não é listado, pois possui índice declarado
        '5th',
        4 => 'fourth', // esse não é listado, pois possui índice declarado e também para a listagem.
        '4th' => 'fourth', // esse não é listado, pois possui índice declarado
        '6th'
        ];

        list($one,$two,$three) = $localSet;
        //print_r($three);
        $this->assertEquals('5th', $three); // observa-se que o elemento de índice '3th' foi pulado na listagem
    }

    /**
     * The testArrayChunk method implementa função array_chunk(), que separa array internamente, de acordo com o
     * numero de elementos por agrupamento setado no segundo parâmetro. A função retorna um novo array array
     * que consiste-se em uma transformação do array passado em um novo array, com os agrupamentos internos
     * tornando-o agora um array multidimensional, pois cada agrupamento se torna um novo array, dentro do array.
     * @return null
     */
    public function testArrayChunk()
    {
        $localSet = ['first', 'second', 'third', 'fourth', 'fifth', 'sixth'];
        $res = array_chunk($localSet, 2);
        //print_r($res);
        $this->assertCount(2, $res[1]);
        $this->assertEquals('third', $res[1][0]);
        $this->assertEquals('fourth', $res[1][1]);
    }
}
