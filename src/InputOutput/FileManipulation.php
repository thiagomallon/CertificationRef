<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\InputOutput
 */
namespace App\InputOutput;

use \App\ErrorsAndExceptions\FileNotFoundException;

/**
 * FileManipulation class. There is many modes to open a file. The following list shows the possible
 * modes to do this:
 *
 * r - open the file for reading only and place the file pointer at the beginning of the file.
 * r+ - same as above but you can also write.
 *
 * w - open for writing only, place the pointer at the beginning of the file and trucate it.
 * w+ - same as above but you can also read.
 *
 * a - open for writing only an place the pointer at the end of the file.
 * a+ - same as above but you can also read the file.
 *
 * x - try to create a file, it it exists fopen will return false and an E_WARNING error will be thrown.
 * The file will be created for writing only and the file pointer obviously will be placed at the beginning
 * of the file.
 * x+ - same as above but you'll be able also to read the file.
 *
 * c - Try to open a file to writing only, if the file doesnt exists, it creates the file, if it exists
 * 'c' mode will not truncate it and will place the file pointer at the beginning of the file.
 * Unlinke 'x' mode, 'c' mode will not generates an E_WARNING error if the file exists.
 *
 * c+ - same as above, but you'll be able also to read the file.
 *
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class FileManipulation
{
    /**
     * Property stores
     * @var string $masterFile Arquivo que contém lista de todos os arquivos temporários criados
     */
    protected $masterFile = 'data/streams/tempFilesList';

    /**
     * The getTempFiles method implementa função file_exists(), que retorna valor boleano, para
     * existência de arquivo, função fopen() e file_get_contents().
     * @return string Lista de todos os arquivos temporários criados através do objeto da
     * presente classe.
     */
    public function getTempFiles()
    {
        (!file_exists($this->masterFile)) ? // verifica existência do arquivo
        fopen($filename, 'x') : // caso não exista, cria arquivo
        null; // dummy

        return file_get_contents($this->masterFile); // retorna conteúdo do arquivo
    }
    
    /**
     * The deleteTempFiles method implementa função fopen() e fgets()
     * @return datatype description
     */
    public function deleteTempFiles()
    {
        $handle = fopen($this->masterFile, 'r+'); // cria handle para o arquivo
        while ($row = fgets($handle)) { // navega conteúdo do arquivo, de linha em linha
            if (file_exists(str_replace(PHP_EOL, '', $row))) { // verifica se arquivo existe
                unlink(str_replace(PHP_EOL, '', $row)); // deleta arquivo
            }
        }
        rewind($handle); // coloca ponteiro no 0
        ftruncate($handle, fseek($handle, 0, SEEK_END)); // trunca arquivo do começo ao fim
        fclose($handle); // fecha handle do arquivo
    }

    /**
     * The deleteFileLine method deleta a primeira linha no arquivo, ao qual se ache
     * o valor da regex
     * @return datatype description
     * @param datatype $filename description, $pattern
     */
    public function deleteFileLine($filename, $pattern)
    {
        if (file_exists($filename)) { // verifica se arquivo existe
            $ptrPos; // armazena posição do ponteiro
            $restContent; // armazena conteúdo do arquivo que ocorre após encontro do padrão
            $handle = fopen($filename, 'r+'); // cria handle do arquivo
            while ($row = fgets($handle)) { // navega arquivos
                if (preg_match($pattern, $row)) { // procura procura padrão na linha atual
                    $restContent = fread($handle, filesize($filename)); // coloca valor que ocorre após padrão, na variável
                    rewind($handle); // coloca ponteiro do arquivo no 0
                    ftruncate($handle, $ptrPos); // trunca arquivo à partir do ponto onde foi encontrado o padrão
                    break; // sai do loop
                }
                $ptrPos = ftell($handle); // captura posição do ponteiro
            }
            fseek($handle, 0, SEEK_END); // coloca ponteiro no final do arquivo
            fwrite($handle, $restContent); // escreve conteúdo posterior novamente
            fclose($handle); // fecha handle do arquivo
        } else {
            throw new FileNotFoundException('File not found'); // caso arquivo não exista, joga exceção
        }
    }

    /**
     * The deleteTempFile method implementa deleção do arquivo, cujo nome é recebido via parâmetro.
     * Método implementa deleção de arquivo
     * @param string $filename Path do arquivo à ser deletado
     * @return null
     */
    public function deleteTempFile($filename)
    {
        $this->deleteFileLine($this->masterFile, "/$filename/"); // método apaga linha do arquivo de lista de temporários
        if (file_exists($filename)) { // verifica se arquivo existe
            unlink($filename); // deleta arquivo
        } else {
            throw new FileNotFoundException('File not found'); // caso arquivo não exista, joga exceção
        }
    }

    /**
     * The tempFileFactory method implementa criação de arquivos temporários, escreve nome do
     * arquivo em arquivo mestre e retorna nome do arquivo recém criado.
     * @param string $prefix Prefixo para o arquivo temporário
     * @return string Path do arquivo temporário criado
     */
    public function tempFileFactory($prefix = 'TESTING')
    {
        $handle = fopen($this->masterFile, 'a+'); // cria handle do arquivo com lista de arquivos temporários
        $filename = tempnam('/tmp', $prefix);  // cria arquivo temporário e armazena seu path na variável $filename
        fwrite($handle, $filename.PHP_EOL); // escreve no arquivo o path do arquivo recém criado, e quebra a linha
        fclose($handle); // fecha handle de arquivo lista de arquivos temporários

        return $filename; // retorna path do arquivo temporário recém criado
    }
    
    /**
     * The writingFile method
     * @return datatype description
     * @param datatype $filename description
     */
    public function writingFile($filename, $content)
    {
        $handle = fopen($filename, 'a+'); // abre arquivo temporário
        fwrite($handle, $content); // escreve no arquivo
        fclose($handle); // fecha handle do arquivo temporário
    }

    /**
     * The readingFile method tenta capturar conteúdo de arquivo cujo nome foi recebido via
     * parâmetro. Método implementa funções file_exists() e file_get_contents().
     * @return datatype description
     */
    public function readingFile($filename)
    {
        if (file_exists($filename)) { // verifica se arquivo existe
            return file_get_contents($filename); // retorna conteúdo do arquivo
        } else {
            throw new FileNotFoundException('File not found'); // caso arquivo não exista, joga exceção
        }
    }

    /**
     * The putData method implementa uso da função file_put_contents() que é utilizada para
     * atribuição de conteúdo a um dado arquivo. A função cria o arquivo, caso o mesmo não exista, e
     * aceita três flags distintas como terceiro parâmetro não obrigatório, sendo essas:
     *
     * FILE_USE_INCLUDE_PATH - Search for filename in the include directory. See include_path for more information.
     * FILE_APPEND - If file filename already exists, append the data to the end of the file instead of overwriting it.
     * LOCK_EX - Acquire an exclusive lock on the file while proceeding to the writing. In other words, a flock()
     * call happens between the fopen() call and the fwrite() call. This is not identical to an fopen() call with mode "x".
     *
     * As flags podem ser utilizadas em conjunto, utilizando-se o operador | (pipe - 'ou' bit a bit).
     * Observa-se dessa forma que o parâmetro é analizado de forma binária.
     * @param string $filename Nome do arquivo ao qual será adicionado conteúdo
     * @param mixed $data Conteúdo a ser inserido no arquivo, podendo esse ser de tipo
     * escalar ou do tipo array.
     * @return datatype description
     */
    public function putData($filename, $data)
    {
        file_put_contents($filename, $data, FILE_APPEND | LOCK_EX);
        /* na função atribuímos dados ao arquivo, e é solicitada exclusividade de manipulação, ou seja,
        enquanto o arquivo estiver sendo manipulado pela funão, o mesmo encontrar-se-a bloqueado para
        outras operações. */
    }

    /**
     * The forceFileDownload method
     * @return datatype description
     */
    public function forceFileDownload()
    {
        header('Content-Disposition: attachment; filename="biblia.pdf"');
        readfile('data/streams/nwt_T.pdf');
    }
}
