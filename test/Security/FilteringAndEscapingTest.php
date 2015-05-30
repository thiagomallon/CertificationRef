<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage Test\Security
 */
namespace Test\Security;

/**
 * Class FilteringTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group Security
 * @group Security/FilteringTest
 */
class FilteringAndEscapingTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Protected property stores object instance
     * @var object $_filteringEscaping
     */
    protected $_filteringEscaping;
    
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $this->_filteringEscaping = new \App\Security\FilteringAndEscaping;
    }
    
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        unset($this->_filteringEscaping);
    }

    /**
     * The testUntainingInputs method testa filtragem de entradas
     * @covers App\Security\Filtering::untainingInputs
     * @return null
     */
    public function testUntainingInputs()
    {
        /* cria índices na superglobal de post */
        $_POST['name'] = 'Jamil o Cão';
        $_POST['pass'] = 'byPass';
        $_POST['color'] = 'green';
        /* chama função de validação */
        $this->_filteringEscaping->untainingInputs();
        /* testa dados */
        $this->assertEquals('Jamil o Cão', $this->_filteringEscaping->clean['name']);
        $this->assertEquals('byPass', $this->_filteringEscaping->clean['pass']);
        $this->assertEquals('green', $this->_filteringEscaping->clean['color']);
    }

    /**
     * The testEscapingOutputs method testa escape de caracteres com signicado especial para o html, bem
     * como aspas e apóstrofos.
     * @covers App\Security\FilteringAndEscaping::escapingOutputs
     * @return null
     */
    public function testEscapingOutputs()
    {
        $this->_filteringEscaping->escapingOutputs('<div class="panel"><strong>Yeshua</strong></div>');
        // print_r($this->_filteringEscaping->html['output']);
        $this->assertEquals('&lt;div class&equals;&quot;panel&quot;&gt;&lt;strong&gt;Yeshua&lt;&sol;strong&gt;&lt;&sol;div&gt;', $this->_filteringEscaping->html['output']);
    }

    /**
     * The requesting method
     * @covers App\InputOutput\UserStreamWrappers::sendRequisition
     * @return string $res Resultado da requisição
     */
    public function requesting($params)
    {
        return \App\InputOutput\UserStreamWrappers::sendRequisition('http://localhost/RepCertification/src/Security/FilteringAndEscaping.php', 'POST', $params);
    }

    /**
     * The testSanitizingInputs method implementa teste ao método sanitizingInputs, que implementa a
     * função filter_input(). A função filter_input(), quando setada com tipo INPUT_POST, exige que uma
     * requisição via POST seja feita ao documento, ela não requer simplesmente a variável setada na
     * superglobal $_POST, sendo assim, a requisição foi implementada via stream wrapper http e uma
     * solução não indicada foi aplicada à classe testada (FilteringAndEscaping), porém, pode-se
     * verificar a atuação da função.
     * caso contrário
     * @covers App\InputOutput\UserStreamWrappers::sendRequisition
     * @covers App\Security\FilteringAndEscaping::sanitizingInput
     * @return null
     */
    public function testSanitizingInput()
    {
        $params = ['call'=>'sanitizingInput','name'=>'David the King']; // cria parâmetros com string padrão
        $res = $this->requesting($params); // gera requisição via post
        $this->assertEquals('David the King', $res); // verifica resultado

        $params = ['call'=>'sanitizingInput','name'=>'São Paulo']; // cria parâmetros com caractere acentuado
        $res = $this->requesting($params); // gera requisição via post
        $this->assertEquals('São Paulo', $res); // verifica resultado

        $params = ['call'=>'sanitizingInput','name'=>'Injecting = ']; // cria parâmetros com caractere inválido
        $res = $this->requesting($params); // gera requisição via post
        $this->assertEquals('Invalid value', $res); // verifica-se que a validação bloqueou a string passada
    }

    /**
     * The testSanitizingFormInputs method
     * @covers App\InputOutput\UserStreamWrappers::sendRequisition
     * @covers App\Security\FilteringAndEscaping::sanitizingFormInputs
     * @return null
     */
    public function testSanitizingFormInputs()
    {
        $params = ['call' => 'sanitizingFormInputs', 'id' => '15', 'name' => 'São João', 'pass' => 'test123', 'color' => 'green'];
        $res = unserialize($this->requesting($params)); // resultado é serializado na classe que implementa os filtros, fazendo-se, assim, necessária desserialização
        //print_r($res);
        $this->assertEquals('15', $res['id']);
        $this->assertEquals('São João', $res['name']);
        $this->assertEquals('test123', $res['pass']);
        $this->assertEquals('green', $res['color']);

        $params = ['call' => 'sanitizingFormInputs', 'id' => 'a15', 'name' => 'São + João', 'color'=>'orange'];
        $res = unserialize($this->requesting($params));
        //print_r($res);
        $this->assertFalse($res['id']);
        $this->assertFalse($res['name']);
        $this->assertNull($res['pass']);
        $this->assertFalse($res['color']);
    }
}
