<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage Test\InputOutpu
 */
namespace Test\InputOutput;

/**
 * Class CSVManipulationTest
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @group Test/InputOutput
 * @group Test/InputOutput/CSVManipulationTest
 */
class CSVManipulationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Protected property stores object instance
     * @var object $_csvManipulation
     */
    protected $_csvManipulation;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $this->_csvManipulation = new \App\InputOutput\CSVManipulation;
    }
    
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown()
    {
        unset($this->_csvManipulation);
    }

    /**
     * The testwritingOnCSV method
     * @covers App\InputOutput\CSVManipulation::writingOnCSV
     * @return null
     */
    public function testwritingOnCSV()
    {
        $this->_csvManipulation->writingOnCSV(['This is a little test! =)']);
        $content = file_get_contents('data/streams/SpreadSheet.csv');
        $this->assertContains('This is a little test! =)', $content);
    }

    /**
     * The testReadingCSV method
     * @covers App\InputOutput\CSVManipulation::readingCSV
     * @return null
     */
    public function testReadingCSV()
    {
        $content = $this->_csvManipulation->readingCSV();
        $this->assertContains('This is a little test! =)', $content);
    }
}
