<?php

class OODaughterClassTest extends PHPUnit_Framework_TestCase
{

    protected $daughter;

    public function setUp()
    {
        $this->daughter = new OODaughterClass();
    }

    public function testSumNumbers()
    {
        $this->assertEquals(12, $this->daughter->sumNumbers(6, 6));
        $this->assertEquals(16, $this->daughter->finalSumNumbers(8, 8));
    }
    
    public function tearDown()
    {
        $this->daughter = null;
    }
}
