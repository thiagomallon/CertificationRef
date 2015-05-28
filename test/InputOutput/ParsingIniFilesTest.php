<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage Test\InputOutput
 */
namespace Test\InputOutput;

/**
 * Class ParsingIniFilesTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group Test/InputOutput
 * @group Test/InputOutput/ParsingIniFilesTest
 */
class ParsingIniFilesTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Protected property stores object instance
     * @var object $_parsingIni
     */
    protected $_parsingIni;
    
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $this->_parsingIni = new \App\InputOutput\ParsingIniFiles;
    }
    
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        unset($this->_parsingIni);
    }

    /**
     * The testGetIniData method testa retorno da função getIniData, que por sua vez retorna
     * resultado de chamada à função parse_ini_file(). A função retorna um array, com chaves/valores
     * especificados no arquivo .ini
     * @return datatype description
     */
    public function testGetIniData()
    {
        $iniData = $this->_parsingIni->getIniData();
        // print_r($iniData);
        $this->assertEquals('CertificationApp', $iniData['application.name']);
    }
}
