<?php

class ArraysTest extends PHPUnit_Framework_TestCase
{

    /* to class instance */
    protected $arraysObj;

    /* método sobrescrito do PHPUnit */
    public function setUp()
    {
        $this->arraysObj = new Arrays();
    }

    /* testa função changedByReference */
    public function testChangedByReference()
    {
        ob_start(); // inicializa output buffer
        $this->arraysObj->changedByReference(); // pega saída do método
        $mOutput = ob_get_clean(); // pega a saída e limpa o buffer
        $this->assertEquals('Michael Jordon,Shane Heal,Andrew Gaze,', $mOutput);
    }

    /* método sobrescrito do PHPUnit */
    public function tearDown()
    {
        $this->arraysObj = null;
    }
}
