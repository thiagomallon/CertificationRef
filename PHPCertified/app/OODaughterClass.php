<?php

class OODaughterClassTest extends PHPUnit_Framework_TestCase
{

    protected $daughter;

    public function setUp()
    {
        $this->daughter = new OODaughterClass();
    }

    public function tearDown()
    {
        $this->daughter = null;
    }
}