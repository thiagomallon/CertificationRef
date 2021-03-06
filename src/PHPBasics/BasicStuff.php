<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\PHPBasics
 */
namespace App\PHPBasics;

/**
 * Objeto criado para implementação de conceitos básicos do PHP
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class BasicStuff
{
    /**
     * Instância do objeto Daughter
     * @var object $_daughter
     */
    protected $_daughter;

    /**
     * Método utiliza a função is_a() do PHP, que verifica se propriedade instância de Daughter,
     * é também instância de Mother (classe mãe) e retorna true em caso positivo.
     * @return bool
     */
    public function isAImplement()
    {
        $this->_daughter = new Daughter();
        // função e método retornam true se $this->_daughter for instância de Mother
        return is_a($this->_daughter, '\App\PHPBasics\Mother');
    }    
}
