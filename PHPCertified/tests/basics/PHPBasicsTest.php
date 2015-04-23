<?php

class PHPBasicsTest extends PHPUnit_Framework_TestCase
{

    protected $phpBasics;

    /* método sobrescrito do PHPUnit */
    public function setUp()
    {
        /* instancia a classe */
        $this->phpBasics = new PHPBasics();
    }

    public function testModValue()
    {
        /* testa se resultado da chamada ao método retora 0 */
        $this->assertEquals(0, $this->phpBasics->modValue());
    }

    /* método sobrescrito do PHPUnit */
    public function tearDown()
    {
        $this->phpBasics = null;
    }
}
