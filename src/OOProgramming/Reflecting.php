<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\OOProgramming
 */
namespace App\OOProgramming;

/**
 * Classe implementada, para serem testados os conceitos da API Reflection do PHP.
 * Nesta, apenas são declarados alguns métodos e propriedades. Para ver funcionamento
 * do Reflection, ir ao arquivo de teste.
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class Reflecting
{
    /**
     * Array armazena nome e valor de propriedades inacessíveis
     * @var array $setOUnaccessibles
     * Array armazena nome e valor de propriedades inacessíveis
     */
    protected $setOUnaccessibles = [];
    /**
     * Variável sem tipo definido, de uso geral
     * @var mixed $realLife
     * Variável sem tipo definido, de uso geral
     */
    protected $realLife;

    /**
     * Retorna argumentos passados à um método inacessível
     * @return mixed
     * @param string $name Nome do método inacessível
     * @param datatype $args Valor a ser atribuído ao método inacessível
     */
    public function __call($name, $args)
    {
        return $args;
    }

    /**
     * Retorna propriedade realLife
     * @return mixed
     */
    public function getRealLife()
    {
        return $this->realLife;
    }
    
    /**
     * Recebe parâmetro na chamada e atribui à propriedade $realLife
     * @return null
     * @param mixed $realLife É atribuído à propriedade $realLife
     */
    public function setRealLife($realLife)
    {
        $this->realLife = $realLife;
    }
}
