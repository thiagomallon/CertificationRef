<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @package App\InputOutput
 */
namespace App\InputOutput;

/**
 * Classe implementa criação e manipulação de streams PHP.
 * Três tipos serão manipulados:
 *  - memory, que guarda os dados em um wrapper file-like alocado em memória volátil, e não em um arquivo fixo.
 *  - temp, guarda os dados em um arquivo temporário do sistema operacional, sendo possível acessá-lo por seu
 *  - arquivo temporário, criado com a função tempnam, aliada a função sys_get_temp_dir(), que nos retorna o
 * local de arquivos temporários do sistema operacional.
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class ResourceStream
{
    /**
     * Método cria e retorna handler de stream wrapper do tipo temp
     * @return resource
     * Retorna stream wrapper do tipo temp, armazenado em arquivo fixo, porém, temporário
     */
    public function factoryTempStreamWrapper()
    {
        return fopen('php://temp', 'a+');
    }

    /**
     * Método escreve em dado
     * @return void
     * @param string $content Dado recebido será atribuído ao conteúdo do stream que
     * o handler manipula.
     */
    public function writeOnTempStreamWrapper($handler, $content)
    {
        fseek($handler, 0, SEEK_END); // coloca ponteiro no fim do arquivo
        fwrite($handler, $content);
        fseek($handler, 0); // coloca ponteiro no começo do arquivo
    }

    /**
     * Método cria stream e retorna closure de manipulação do mesmo.
     * @return callable closure de manipulação do stream
     * @param string $openMode Especificação do tipo de abertura
     * do arquivo.
     */
    public function factoryTempStreamManipulator($openMode)
    {
        $handler = fopen('php://temp', $openMode); // cria stream

        /* closure recebe mensagem via parâmetro e via use recebe o handler supra-criado, do stream */
        return static function ($content = null, $begin = false) use ($handler) {
            (!$begin)? // verifica se flag de limpeza e atribuição ao começo do stream, não foi setada
                fseek($handler, 0, SEEK_END) : // colococa ponteiro no fim do arquivo
                ftruncate($handler, 0); // limpa arquivo

            ($content)? fwrite($handler, $content) : null; // caso tenha-se recebido mensagem, atribui-se ao stream
            fseek($handler, 0); // coloca ponteiro no começo do stream
            return fread($handler, 1024); // retorna conteúdo do stream
        };
    }
}
