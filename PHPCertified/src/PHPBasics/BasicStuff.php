<?php

namespace App\PHPBasics;

class BasicStuff
{
    protected $_daughter;

    public function isAImplement()
    {
        $this->_daughter = new Daughter();
        // função e método retornam true se $this->_daughter for instância de Mother
        return is_a($this->_daughter, '\App\PHPBasics\Mother');
    }
}