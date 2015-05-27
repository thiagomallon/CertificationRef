<?php

/**
 * Created by Thiago Mallon.
 */

/**
 */

namespace test\WebFeatures;

/**
 * Class ConfigsXMLReaderTest.
 *
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group WebFeatures
 * @group WebFeatures/ConfigsXMLReaderTest
 */
class ConfigsXMLReaderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Protected property stores object instance.
     *
     * @var object
     */
    protected $_configXML;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $this->_configXML = new \App\WebFeatures\ConfigsXMLReader();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        unset($this->_configXML);
    }

    /**
     * The testsetFilePath method
     * @return null
     * @covers \App\WebFeatures\ConfigsXMLReader::setFilePath
     */
    public function testSetFilePath()
    {
        // seta arquivo a ser testado
        $this->_configXML->setFilePath('data/streams/somethingElse.xml');
        $xml = $this->_configXML->getXMLData(); // captura conteúdo do arquivo
        // print_r($xml);
        $this->assertEquals('Conteúdo do somethingElse', $xml->else);
    }

    /**
     * The testGetXMLData method.
     *
     * @covers \App\WebFeatures\ConfigsXMLReader::getXMLData
     */
    public function testGetXMLData()
    {
        $xmlData = $this->_configXML->getXMLData(); // pega retorno da função getXMLData
        $this->assertInternalType('object', $xmlData); // verifica se tipo interno da função é object
        $this->assertInstanceOf('SimpleXMLElement', $xmlData); // verifica se é instância de SimpleXMLElement
    }

    /**
     * The testGetElementData method.
     *
     * @covers \App\WebFeatures\ConfigsXMLReader::getElementData
     */
    public function testGetElementData()
    {
        $element = $this->_configXML->getElementData('database');
        $this->assertInstanceOf('\SimpleXMLElement', $element);
        $this->assertInternalType('object', $element);
        //print_r($element);
    }

    /**
     * The testGetElementDataByAttr method
     * @return null
     * @covers \App\WebFeatures\ConfigsXMLReader::getElementData
     * @covers \App\WebFeatures\ConfigsXMLReader::getElementDataByAttr
     */
    public function testGetElementDataByAttr()
    {
        $elementDetails = ['element'=>'database', 'attribute'=>'dbms', 'value'=>'mysql']; // matriz relativa ao atributo a ser selecionado
        $selectedElm = $this->_configXML->getElementDataByAttr($elementDetails); // chama função que retorna dados do elemento, para o atributo passado
        //print_r($selectedElm);
        $this->assertInstanceOf('\SimpleXMLElement', $selectedElm); // verifica-se se é instancia esperada
        $this->assertInternalType('object', $selectedElm); // verifica-se se é objeto

        $this->assertEquals(4, count($selectedElm)); // método assertCount() não funciona para objetos, sendo assim, verifica-se atraves da função count()
        $this->assertEquals('db_test', $selectedElm->name); // verifica-se valor da propriedade host, do objeto
        $this->assertEquals('mysql', $selectedElm['dbms']); // verifica-se valor do atributo
    }

    /**
     * The testGetElementDataByAttrError method
     * @expectedException RangeException
     * @covers \App\WebFeatures\ConfigsXMLReader::getElementDataByAttr
     */
    public function testGetElementDataByAttrError()
    {
        $database = $this->_configXML->getElementData('database');
        $selectedElm = $this->_configXML->getElementDataByAttr(['element'=>'database', 'attribute'=>'nda', 'value'=>'nda']); // chama função que retorna dados do elemento, para o atributo passado
    }
}