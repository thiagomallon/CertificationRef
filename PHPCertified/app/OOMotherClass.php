<?php

class OOMotherClass
{

    public final $number;

    final public function finalSumNumbers($n1, $n2)
    {
        return ($n1 + $n2);
    }

    public function sumNumbers($n1, $n2)
    {
        return $n1 + $n2;
    }
}