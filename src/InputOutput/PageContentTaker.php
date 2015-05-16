<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @package App\InputOutput
 */
namespace App\InputOutput;

/**
 * Classe PageContentTaker
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class PageContentTaker
{
    /**
     * Método retorna $handle de página capturada
     * @return resource
     */
    public static function takingWithGet($url)
    {
        $opts = [
        'http'=> [
        'method'=>"GET",
        'header'=>"Accept-language: en\r\n".
        "Cookie: foo=bar\r\n"]
        ];

        $context = stream_context_create($opts);

        /* Sends an http request to www.example.com
        with additional headers shown above */
        $fp = fopen($url, 'r', false, $context);
        print_r($fp);
        fpassthru($fp);
        fclose($fp);
    }
}
