<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\Security
 */
namespace App\Security;

/**
 * Class Filtering
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class Filtering
{

    /**
     * Property stores
     * @var datatype $cleanFormParams description
     */
    protected $cleanFormParams;

    /**
     * The filtering method
     * @param datatype $reqStuff description
     * @return datatype description
     */
    public function filtering($reqStuff)
    {
        // faz validação de entrada de nome
        if (ctype_alpha($reqStuff['name']) || preg_match('/[a-zA-Z\s]+', $reqStuff['name'])) {
            $this->cleanFormParams['name'] = $reqStuff;
        }

        print $_POST['name'];
    }
}
