<?php

namespace App\PHPBasics;

class Daughter extends Mother
{
    protected $name;

    public function __construct()
    {

    }

    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }
}
