<?php
/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-05-05 at 12:12:07.
 * @group FunctionsAndArrays
 * @group ArrayStuffTest
 */
class ArrayStuffTest extends PHPUnit_Framework_TestCase
{

    protected $setOfStuff;

    public function setUp()
    {
        $this->setOfStuff = [
        "1st"=>"first",
        "2nd"=>"second",
        "3rd"=>"Third",
        "dont" => "do_not",
        "wanna" => "want_to"
        ];
    }

    public function tearDown()
    {
        unset($this->setOfStuff);
    }
    
    public function testInArrayImplement()
    {
        /* função in_array retorna true se valor do primeiro argumento
         * existir em qualquer um dos índices do array do segundo 
         * argumento.
         */
        $stuffResult = in_array("second", $this->setOfStuff);
        /* verifica se retornou true */
        $this->assertTrue($stuffResult);
    }


    public function testArrayKeysImplement()
    {
        $indexesOfStuff = array_keys($this->setOfStuff);

        $this->assertArrayNotHasKey("1st", $indexesOfStuff);
    }


    public function testArrayKeyExistsImplement()
    {
        $this->assertTrue(array_key_exists("3rd", $this->setOfStuff));
    }

    public function testArrayValuesImplement()
    {
        $this->assertContains('do_not', $this->setOfStuff);
    }

    public function testArrayFlipImplement()
    {
        $invertedStuf = array_flip($this->setOfStuff);
        $this->assertArrayHasKey('want_to', $invertedStuf);
    }
}