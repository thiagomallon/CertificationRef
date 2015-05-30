<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\InputOutpu
 */
namespace App\InputOutput;

/**
 * Class UserStreamWrappers
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class UserStreamWrappers
{
    /**
     * The sendPostRequisition method
     * @return null
     */
    public static function sendRequisition($url, $method = 'POST', $params = [])
    {
        $params = http_build_query($params);

        $opts = array('http' => [
            'method'  => $method,
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $params
            ]);
        $context = stream_context_create($opts);
        return file_get_contents($url, false, $context);
    }
}
