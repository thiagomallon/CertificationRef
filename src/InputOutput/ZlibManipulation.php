<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\InputOutput
 */
namespace App\InputOutput;

use App\ErrorsAndExceptions\FileNotFoundException;

/**
 * Class ZlibManipulation
 *
 * Diferentemente da manipulação convencionarl dos arquivos, não é possível abrir um stream wrapper do
 * tipo zlib com um modo escrita e leitura simultaneos ('+') e também este wrapper suporta apenas as
 * opções 'r', 'w' e 'a'. Os modos 'x' e 'c' apesar de criarem o arquivo, geram exceção e, mais uma vez,
 * os modos extendidos, ou seja, seguidos de '+' todos geram exceção e não criam/abrem o arquivo.
 *
 * Serão exemplificados meios de manipular o arquivo .gz com as funções de manipulação de arquivo padrão
 * (ex: fopen(), fread()) e com as funções específicas para manipulação de arquivo de extensão .gz.
 *
 * A vantagem no uso das funções específicas e que, em algumas ocasiões, escreve-se menos, como no caso
 * da abertura/criação:
 *
 * fopen('compress.zlib://'.$filename, 'a');
 * gzopen($filename, 'a');
 *
 * Observe que a função gzopen exige menos escrita, para a mesma funcionalidade. É conveniente falar
 * que um handler aberto com gzopen() pode ser manipulado por funções como fread(), fwrite(), e várias
 * outras, tendo, porém, algumas limitações, como no caso da função fseek, que não é suportada para
 * arquivos .gz.
 *
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class ZlibManipulation
{
    /**
     * Property stores
     * @var datatype $masterFile description
     */
    protected $masterFile = 'data/streams/file.gz';

    /**
     * The writingOnGz method implementa abertura/criação de arquivo. Utiliza-se o modo a,
     * que abre o arquivo somente para escrita, caso o arquivo não exista, será criado e o ponteiro
     * do mesmo será colocado no fim do arquivo.
     * @param string $content Conteúdo a ser escrito no arquivo
     * @param string $filename Path do arquivo a ser solicitado o handle
     * @return null
     */
    public function writingOnGz($content, $filename = 'data/streams/file.gz')
    {
        // $handle = fopen('compress.zlib://'.$filename, 'a'); // também é suportado
        $handle = gzopen($filename, 'a'); // abre/cria arquivo
        // fwrite($handle, $content); // funciona mesmo quando aberto com gzopen()
        gzwrite($handle, $content); // escreve no arquivo, com função específica
        // fclose($handle); // funciona mesmo quando aberto com gzopen()
        gzclose($handle); // fecha arquivo com função específica
    }

    /**
     * The readingGz method implementa leitura de arquivo.
     * @param datatype $filename description
     * @return string Conteúdo do arquivo
     */
    public function readingGz($filename = 'data/streams/file.gz')
    {
        if (file_exists($filename)) {
            // $handle = fopen('compress.zlib://'.$filename, 'r'); // abre arquivo para leitura
            $handle = gzopen($filename, 'r');
            // $content  = fread($handle, filesize($filename)); // lê arquivo
            $content  = gzread($handle, filesize($filename)); // lê arquivo
            // fclose($handle); // fecha arquivo
            gzclose($handle); // fecha arquivo
            return $content;
        } else {
            throw new FileNotFoundException('File not found'); // gera exceção
        }
    }

    /**
     * The stringCompressor method
     * @param string $string String a ser comprimida
     * @return null
     */
    public function stringCompressor($string)
    {
        
    }
}
