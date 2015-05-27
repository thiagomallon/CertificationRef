<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\StringsAndPatterns
 */
namespace App\StringsAndPatterns;

/**
 * Classe PregMatching implementa diferentes conceitos de padrões e os executa com a função preg_match().
 * A função preg_match() atua de forma não global, sendo essa atuação possível para outra variedade da
 * mesma, a preg_match_all(). Não é possível atribuir-se a flag g, em REGEX do PHP, gerando-se um warning,
 * na tentativa de atribuição da mesma. Pode-se aplicar a flag m (multiline), porém, sem
 * atuar-se globalmente ela não é, de fato, aplicada.
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class PregMatching
{
    /**
     * Propriedade armazena conteúdo de arquivo cobaia
     * @var string $_fileContent
     */
    protected $_fileContent;

    /**
     * Método construtor inicializa propriedade com conteúdo de arquivo
     * @return null
     */
    public function __construct()
    {
        $this->_fileContent = file_get_contents('public/files/html-sample.html');
    }

    /**
     * Método implementa procura simples de padrão de regex
     * @return string
     */
    public function simpleMatching()
    {
                
    }
}
