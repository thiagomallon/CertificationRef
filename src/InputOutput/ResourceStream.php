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
 *  - protocolo implementado por usuário, que é criado através da função stream_wrapper_register().
 * endereço fixo.
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
}
