<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\InputOutput
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
     * @param string $wrapper Parâmetro não obrigatório, que atribui por padrão o wrapper php.
     * @param string $wrapperType Parâmetro não obrigatório, que atribui por padrão o tipo de wrapper memory.
     * @param string $openMode Parâmetro não obrigatório, que atribui o mode em que o wrapper será manipulado
     */
    public function factoryStreamWrapper($wrapper = 'php', $wrapperType = 'memory', $openMode = 'a+')
    {
        return (in_array($wrapper, $this->getAvailableWrapper()))?
        fopen($wrapper.'://'.$wrapperType, $openMode) :
        'Invalid wrapper';
    }

    /**
     * Método cria e retorna handler de stream wrapper do tipo temp
     * @return resource Retorna stream wrapper do tipo temp, armazenado em arquivo fixo, porém, temporário
     * @param string $openMode Parâmetro não obrigatório, seta o modo em que o wrapper será aberto/manipulado
     */
    public function factoryMemoryStreamWrapper($openMode = 'a+')
    {
        return fopen('php://memory', $openMode);
    }

    /**
     * Método escreve em dado
     * @return null
     * @param resource $handler Handler a ser escrito
     * @param string $content Dado recebido será atribuído ao conteúdo do stream que
     * o handler manipula.
     */
    public function writeOnStreamWrapper($handler, $content)
    {
        fseek($handler, 0, SEEK_END); // coloca ponteiro no fim do arquivo
        fwrite($handler, $content);
        fseek($handler, 0); // coloca ponteiro no começo do arquivo
    }

    /**
     * Método recebe por referência o wrapper ao qual deve ser atribuído
     * o lock. Os tipos, são:
     *
     * - LOCK_SH to acquire a shared lock (reader).
     * - LOCK_EX to acquire an exclusive lock (writer).
     * - LOCK_UN to release a lock (shared or exclusive).
     *
     * @return null
     * @param resource &$handler Handler do stream, por referência
     * @param integer $lockOperation Tipo de lock a ser atribuído ao stream. Apesar do dado ser uma constante,
     * ele possui valor inteiro, por isso o datatype é integer.
     */
    public function setStreamLock(&$handler, $lockOperation)
    {
        flock($handler, $lockOperation);
    }

    /**
     * Método retorna conteúdo do stream passado, através da execução e captura de retorno
     * da função stream_get_contents do PHP
     * @return string Conteúdo do stream passado
     * @param resource $handler Parâmetro recebe dado to tipo resourse, para posicionamento do ponteiro
     * na posição 0 e retorno do conteúdo do mesmo.
     */
    public function getStreamContent($handler)
    {
        return stream_get_contents($handler, -1, 0);
    }

    /**
     * Método cria stream wrapper do tipo memory e retorna closure de manipulação do mesmo.
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
                ftruncate($handler, 0); // limpa arquivo e coloca ponteiro na posição 0

            ($content)? fwrite($handler, $content) : null; // caso tenha-se recebido mensagem, atribui-se ao stream
            fseek($handler, 0); // coloca ponteiro no começo do stream
            return fread($handler, 1024); // retorna conteúdo do stream
        };
    }

    /**
     * Método cria stream wrapper do tipo memory e retorna closure de manipulação do mesmo.
     * @return callable closure de manipulação do stream
     * @param string $openMode Especificação do tipo de abertura
     * do arquivo.
     */
    public function factoryMemoryStreamManipulator($openMode)
    {
        $handler = fopen('php://memory', $openMode); // cria stream

        /* closure recebe mensagem via parâmetro e via use recebe o handler supra-criado, do stream */
        return static function ($content = null, $begin = false) use ($handler) {
            (!$begin)? // verifica se flag de limpeza e atribuição ao começo do stream, não foi setada
                fseek($handler, 0, SEEK_END) : // colococa ponteiro no fim do arquivo
                ftruncate($handler, 0); // limpa arquivo e coloca ponteiro na posição 0

            ($content)? fwrite($handler, $content) : null; // caso tenha-se recebido mensagem, atribui-se ao stream
            fseek($handler, 0); // coloca ponteiro no começo do stream
            return fread($handler, 1024); // retorna conteúdo do stream
        };
    }

    /**
     * Método executa função stream_get_wrappers(), que retorna array de wrappers
     * disponíveis. Método retorna retorno da função do PHP.
     * @return array Retorna array de wrappers disponíveis
     */
    public function getAvailableWrapper()
    {
        return stream_get_wrappers();
    }
}
