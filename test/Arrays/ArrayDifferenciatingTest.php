<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage Test\Arrays
 */
namespace Test\Arrays;

/**
 * Class ArrayDifferentiatingTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group Arrays
 * @group Arrays/ArrayDifferentiatingTest
 */
class ArrayDifferentiatingTest extends \PHPUnit_Framework_TestCase
{


    /**
     * Método testa atribuição de array à função array_intersect_assoc(), do PHP.
     * Função array_intersect_assoc(), compara dois array e retorna um terceiro array
     * com os elementos em que coincidem tanto índice quanto valor. Nos dois arrays de
     * teste, o único elemento que ocorre com mesmo valor e índice em ambos é o de índice
     * 'Carlos', sendo assim esse o único elemento que existirá no array retornado da função.
     * @return null
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
     * a ser comparado e o segundo é o array à comparar. A função retorna um
     * terceiro array, com os elementos do primeiro, que possuírem valores
     * existentes entre os elementos do segundo array. Observe o array de retorno
     * atribuído à função var_dump().
     * O array retornado se caracteriza por conter os elementos do primeiro
     * elemento, que por sua vez tenham valores existentes em qualquer dos elementos do segundo,
     * não importando a coincidência dos índices, mas tão somente os valores.
     * @return null
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
        // print_r($res);
        $this->assertCount(3, $res);
    }
    
    /**
     * The testArrayDiff method verifica diferença entre valores de índices iguais, sejam esses numéricos
     * ou associativos. A função retorna elementos do primeiro array, que possuam diferenças no segundo array.  
     * @return null
     */
    public function testArrayDiff()
    {
        $a = ['first', 'second', 'third', 'position' => 'chimpz', 'champz'];
        $b = ['first', 'third', 'fourth', 'position' => 'champz'];

        $res = array_diff($a, $b);
        // print_r($res);
        $this->assertCount(2, $res); // duas diferenças encontradas
        
        $this->assertArrayHasKey(1, $res);
        $this->assertEquals('second', $res[1]);

        $this->assertArrayHasKey('position', $res);
        $this->assertEquals('chimpz', $res['position']);
    }
}
