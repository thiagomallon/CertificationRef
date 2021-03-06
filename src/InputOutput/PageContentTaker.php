<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\InputOutput
 */
namespace App\InputOutput;

/**
 * Classe PageContentTaker
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class PageContentTaker
{

    /**
     * The takingContent method
     * @return datatype description
     */
    public function takingContent()
    {
        $options = [
        'http' => [
        'method' => 'GET',
        'user_agent' => "t.Mallon's interception",
        'header' => "Accept-language: en\r\n".
        "Cookie: foo=bar\r\n".
        "Origin: quintal-la-de-casa\r\n".
        "Referer: anteonte\r\n"
        ]
        ];

        $context = stream_context_create($options);

        $content = file_get_contents('http://localhost/RepCertification/data/streams/check-requisitions.php', false, $context);
        return $content;
    }
    /**
     * Método retorna $handle de página capturada
     * @param string $url
     * @return resource
     */
    public static function takingWithGet($url = 'http://example.com/')
    {
        $opts = [ // cria array de contexto, para stream de protocolo http
        'http'=> [
        'method'=>"GET",
        'header'=>"Accept-language: en\r\n".
        "Cookie: foo=bar\r\n"]
        ];

        $context = stream_context_create($opts); // cria contexto através do array recebido

        /* Sends an http request to www.example.com
        with additional headers shown above */
        $fp = fopen($url, 'r', false, $context); // abre arquivo em modo de leitura
        ob_start(); // inicia buffer de saída (output buffer)
        fpassthru($fp); // lê todo o stream e coloca conteúdo no buffer de saída
        $fileContent = ob_get_clean(); // pega tudo que existe no buffer de saída e armazena na variável
        fclose($fp); // fecha arquivo
        return $fileContent; // retorna conteúdo capturado pelo output buffer
    }

    /**
     * Método
     * @param string $url
     * @return datatype description
     */
    public function takingWithPost($param, $url = 'http://localhost/RepCertification/data/streams/check-post-requisition.php')
    {
        $postdata = http_build_query($param);

        $opts = array('http' => [
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
            ]);

        $context = stream_context_create($opts);
        // $result = file_get_contents('http://example.com/submit.php', false, $context);
        return file_get_contents($url, false, $context);
    }

    /**
     * Método
     * @param string $url
     * @return datatype description
     */
    public function takingWithPostAndSocket($url = 'http://localhost/RepCertification/public/form.php')
    {
        $postdata = http_build_query([
            'nome' => 'Thiago',
            'sobrenome' => 'Mallon'
            ]);

        $opts = array('http' => [
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
            ]);

        $context = stream_context_create($opts);
        // $result = file_get_contents('http://example.com/submit.php', false, $context);
        return file_get_contents($url, false, $context);
    }
}
