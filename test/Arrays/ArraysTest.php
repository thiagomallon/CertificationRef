<?php
/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-05-05 at 12:12:07.
 */

/**
 * @package Test\Arrays
 */
namespace Test\Arrays;

/**
 * Classe de testes do objeto Arrays
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group Arrays
 * @group Arrays/ArrayTest
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
     * Método testa função in_array() do PHP. Função verifica se existe dado
     * valor em qualquer um dos índices do array passado e retorna true caso
     * ocorra.
     * @return void
     */
    public function testInArrayImplement()
    {
        $stuffResult = in_array("second", $this->setOfStuff);
        $this->assertTrue($stuffResult);
    }

    /**
     * Método testa função array_keys do PHP. Quando um array é passado à função,
     * a mesma retornará um novo array, com os elementos desse último como valores
     * e os índices, dessa vez, númericamente indexados.
     * @return void
     */
    public function testArrayKeysImplement()
    {
        $indexesOfStuff = array_keys($this->setOfStuff);
        $this->assertArrayNotHasKey("1st", $indexesOfStuff);
    }

    /**
     * Método testa função array_key_exists() do PHP. Função verifica se existe
     * dado índice no array e retorna true caso ocorra.
     * @return void
     */
    public function testArrayKeyExistsImplement()
    {
        $this->assertTrue(array_key_exists("3rd", $this->setOfStuff));
    }

    /**
     * Método testa função array_values do PHP. Quando um array é passado à função
     * a mesma devolve um novo array, com os valores do antigo, porém, com novos índices,
     * dessa vez numericamente indexados.
     * @return void
     */
    public function testArrayValuesImplement()
    {
        $valuesOfStuffs = array_values($this->setOfStuff);
        $this->assertContains('do_not', $valuesOfStuffs);
    }

    /**
     * Método testa função array_flip do PHP. Função recebe um array e devolve o mesmo com índices
     * e valores invertidos, ou seja, índice no lugar do valor e vice-versa.
     * @return void
     */
    public function testArrayFlipImplement()
    {
        $invertedStuf = array_flip($this->setOfStuff);
        $this->assertArrayHasKey('want_to', $invertedStuf);
    }

    /**
     * Método implementa função sort().
     * Quando aplicamos a função sort() a um array, o mesmo será ordenado segundo os seus valores
     * e não será preservadas as ordems dos índices do array e se o mesmo for associativo, os índices
     * associativos serão substituídos por índices numéricos.
     * @return void
     */
    public function testSortArray()
    {
        $localSet = [
        'Arnoldo'=>'Chove Várzea Negra',
        'Oscar' => 'Shimitd',
        'Carlos'=> 'Albino'
        ];

        sort($localSet);
        // var_dump($localSet); // verifica que os índices associativos foram substituídos por numéricos
        $this->assertContains('Albino', $localSet[0]);
    }

    /**
     * Método atua de forma semelhante à função sort(), diferenciando-se na ordem em que se dispõe
     * os elementos, fazendo-o de forma reversa.
     * @return void
     */
    public function testRSortArray()
    {
        $localSet = [
        'Arnoldo'=>'Chove Várzea Negra',
        'Oscar' => 'Shimitd',
        'Carlos'=> 'Albino'
        ];

        rsort($localSet);
        // var_dump($localSet); // verifica que os índices associativos foram substituídos por numéricos
        $this->assertContains('Shimitd', $localSet[0]);
    }

    /**
     * Método testa atribuição de array à função array_intersect_assoc(), do PHP.
     * Função array_intersect_assoc(), compara dois array e retorna um terceiro array
     * com os elementos em que coincidem tanto índice quanto valor. Nos dois arrays de
     * teste, o único elemento que ocorre com mesmo valor e índice em ambos é o de índice
     * 'Carlos', sendo assim esse o único elemento que existirá no array retornado da função.
     * @return void
     */
    public function testArrayIntersectAssoc()
    {
        $localSetA = [
        'Arnoldo'=>'Churrus de Nega',
        'Oscar' => 'Shimitd',
        'Carlos'=> 'Albino'
        ];

        $localSetB = [
        'Arnoldo'=>'Chove Várzea Negra',
        'Oscar' => 'Chimidi',
        'Carlos'=> 'Albino'
        ];

        $res = array_intersect_assoc($localSetA, $localSetB);
        //var_dump($res);
        $this->assertCount(1, $res);
        $this->assertContains('Albino', $res); // verifica-se ocorrência do valor Albino
    }

    /**
     * Método implementa função array_intersect() do PHP, e testa sua atuação.
     * A função array_intersect() espera dois parâmetros o primeiro é o array
     * a ser comparado e o segundo é o array a comparar. A função retorna um
     * terceiro array, com os elementos do primeiro, que possuírem valores
     * existentes entre os elementos do segundo array. Observe o array de retorno
     * atribuído à função var_dump().
     * O array retornado se caracteriza por conter os elementos do primeiro
     * elemento, que por sua vez tenham valores existentes em qualquer dos elementos do segundo,
     * não importando a coincidência dos índices, mas tão somente os valores.
     * @return void
     */
    public function testArrayIntersect()
    {
        $localSetA = [
        'Arnoldo'=>'Churrus de Nega',
        'Oscar' => 'Shimitd',
        'Carlos'=> 'Albino',
        'John'=> 'Luke',
        'Mathew'=> 'Marc',
        ];
        $localSetB = [
        'Arnoldo'=>'Luke',
        'Oscar' => 'Albino',
        'Carlos'=> 'Marc'
        ];
        $res = array_intersect($localSetA, $localSetB);
        // var_dump($res);
        $this->assertCount(3, $res);
    }

    /**
     * Método testa implementação da função array_combine() do PHP. Verifica-se que a função combina
     * dois arrays, através da seguinte abordagem: Os valores do array do primeiro parâmetro serão
     * as chaves dos valores do array do segundo parâmetro, sendo assim uma combinação dos valores dos
     * dois arrays, porém, os valores do primeiro sendo convertidos em índices. A função retorna um
     * terceiro array com a implementação. É importante ressaltar que ambos arrays a serem combinados,
     * devem ter exatamente o mesmo número de elementos, do contrário um warning é gerado.
     * @return void
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
     * @return void
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
     * @return void
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
     * @return void
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
     * @return void
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
     * @return void
     */
    public function testArraySlice()
    {
        $res = array_slice($this->setOfStuff, 3, 5); // refere-se aos índices associativos, com seus relativos numéricos - não é aplicada reordenação de índices
        //print_r($res);
    }

    /**
     * Método implementa ordenação de forma ascendênte aos valores dos elementos do array
     * passado, função preserva valores dos índices, sejam esses numéricos ou associativos,
     * porém, não ordena corretamente valores alfa numéricos, não substituindo, assim, a função
     * natsort().
     * @return void
     */
    public function testASortArray()
    {
        $localSet = [
        'a'=>'book11.pdf',
        'b'=>'book1.pdf',
        'c'=>'book2.pdf',
        'd'=>'book12.pdf',
        ];

        asort($localSet);
        //var_dump($localSet);
        $this->assertCount(4, $localSet); // mera constância de assertion
    }

    /**
     * Método testa atribuição de array à função ksort() do PHP. Verifica-se que apesar
     * de ordenar os índices e manter a associação ao valor, não ordenando assim os valores,
     * mas tão somente os índices, a função ksort() não ordena de forma eficiente índices de
     * de nomes alfanuméricos, o índice book2.pdf é colocado posterior ao índice book12.pdf.
     * O var_dump mostra a atuação da função em um array associativo.
     * @return void
     */
    public function testKSortArray()
    {
        $localSet = [
        'book11.pdf'=>'a',
        'book1.pdf'=>'b',
        'book2.pdf'=>'c',
        'book12.pdf'=>'d',
        ];
        ksort($localSet);
        //var_dump($localSet);
        $this->assertCount(4, $localSet); // mera constância
    }

    /**
     * Método testa implementação de função natsort() do PHP.
     * Quando ordenamos os valores alfanúmericos de um array, pela função padrão (sort())
     * o ordenamento não é feito realmente da forma que se espera, o var dump da função
     * sort(), abaixo, mostra como os valores são ordenados, porém quando utilizamos a
     * função natsort() o ordenamento é o que mais comumente se espera. É importante
     * ressaltar que os índices são preservados na função nartsort(), somente a ordem
     * dos elementos é alterada.
     * @return void
     */
    public function testNatSort()
    {
        $localSet = [
        'c'=>'book11.pdf',
        'a'=>'book1.pdf',
        'b'=>'book2.pdf',
        'd'=>'book12.pdf',
        ];
        natsort($localSet);
        //var_dump($localSet); // aqui vemos a ordenação alfanumérica acontecer
        $this->assertCount(4, $localSet);
    }

    /**
     * Método retorna soma de todos os valores numéricos do array.
     * Observações: Quando um elemento possui valores alfanuméricos, a menos que esse valor
     * alfanumérico comece com representações numéricas ('345cdf') o elemento não será incluido
     * na soma, e também quando inicia com dígitos, obviamente que somente os dígitos serão
     * incluídos na soma.
     * @return void
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
     * Método implementa teste à função array_map() do PHP.
     * A função submete cada elemento do array passado à uma função callback, que pode ser tanto uma função externa,
     * ou um método (em caso de escopo de classe), ou um closure. No exemplo abaixo utilizamos um closure como a função
     * callback. O closure receberá cada elemento do array e poderá então alterar o valor de cada índice recebido.
     * @return void
     */
    public function testArrayMap()
    {
        /* manipulação dos valores do array */
        $res = array_map(function ($element) {
            return $element.' - interceptado pelo closure';
        }, $this->setOfStuff);/* manipulação dos valores do array */
        // print_r($res); // aqui observamos a concatenação de uma string à cada valor de cada elemento do array passado
    }

    /**
     * Método implementa teste à função array_count_values() do PHP.
     * Função conta quantas vezes um mesmo valor ocorre no array passado e retorna um outro array, com dodos os valores
     * e a quantidade de suas ocorrências. O Array possui então, os valores nos lugares dos índices e a quantidade de
     * ocorrência daquele valor, em seus valor. Observe o que se imprime na função print_r();
     * @return void
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
     * @return void
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
}
