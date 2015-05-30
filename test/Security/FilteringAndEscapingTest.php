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
     * The testSanitizingInputs method
     * @covers App\InputOutput\UserStreamWrappers::sendRequisition
     * @covers App\Security\FilteringAndEscaping::sanitizingInputs
     * @return null
     */
    public function testSanitizingInputs()
    {
        $params = ['call'=>'sanitizingInputs','name'=>'David the King'];
        $res = \App\InputOutput\UserStreamWrappers::sendRequisition('http://localhost/RepCertification/src/Security/FilteringAndEscaping.php', 'POST', $params);
        $this->assertEquals('David the King', $res);

        $params = ['call'=>'sanitizingInputs','name'=>'São Paulo'];
        $res = \App\InputOutput\UserStreamWrappers::sendRequisition('http://localhost/RepCertification/src/Security/FilteringAndEscaping.php', 'POST', $params);
        $this->assertEquals('São Paulo', $res);

        $params = ['call'=>'sanitizingInputs','name'=>'Injecting = '];
        $res = \App\InputOutput\UserStreamWrappers::sendRequisition('http://localhost/RepCertification/src/Security/FilteringAndEscaping.php', 'POST', $params);
        $this->assertEquals('Invalid value', $res);
    }
}
