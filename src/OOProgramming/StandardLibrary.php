<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\OOProgramming
 */
namespace App\OOProgramming;

/**
 * Class StandardLibrary
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class StandardLibrary
{

    /**
     * Property stores
     * @var datatype $checkpoint description
     */
    public $checkpoint;

    /**
     * The generating method
     * @return object Instance of Generator class
     */
    public function generating()
    {
        $this->checkpoint = 'first';
        yield 'first-checkpoint';
        $this->checkpoint = 'second';
        yield 'second-checkpoint';
        $this->checkpoint = 'third';
        yield 'third-checkpoint';
    }
}
