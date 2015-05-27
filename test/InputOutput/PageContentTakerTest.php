<?php

/**
 * Created by Thiago Mallon
 */
        
/**
 * @subpackage Test\InputOutput
 */
namespace Test\InputOutput;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-05-16 at 14:29:12.
 */
class PageContentTakerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Propriedade
     * @var PageContentTaker $_pageContentTaker
     */
    protected $_pageContentTaker;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->_pageContentTaker = new \App\InputOutput\PageContentTaker;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        unset($this->_pageContentTaker);
    }

    /**
     * Método de teste
     * @return null
     * @covers App\InputOutput\PageContentTaker::takingWithGet
     */
    public function testTakingWithGet()
    {
        //$this->markTestIncomplete('Incomplete. Method need more tests!');
        //print_r($this->_pageContentTaker->takingWithGet('http://www.example.com'));
        $content = $this->_pageContentTaker->takingWithGet('http://www.example.com');
        // $handle = fopen('public/files/html-sample.html', 'w+');
        // fwrite($handle, $content);
        // fclose($handle);
        // print_r(file_get_contents('public/files/html-sample.html'));
    }

    /**
     * Método de teste
     * @return null
     * @covers App\InputOutput\PageContentTaker::takingWithPost
     */
    public function testTakingWithPost()
    {
        $this->markTestIncomplete('Incomplete. Method need more tests!');
        print_r($this->_pageContentTaker->takingWithPost());
    }

    /**
     * Método
     * @return null
     * @covers App\InputOutput\PageContentTaker::takingWithPostAndSocket
     */
    public function testTakingWithPostAndSocket()
    {
        $this->markTestIncomplete('Incomplete. Method need more tests!');
        print_r($this->_pageContentTaker->takingWithPostAndSocket());
    }
}
