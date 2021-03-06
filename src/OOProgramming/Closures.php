<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\OOProgramming
 */
namespace App\OOProgramming;

/**
 * Não pode:
 *  - utilizar-se propriedades da classe como parâmetros do closure
 *  - utilizar-se propriedades da classe como parâmetro para a diretiva use
 * Pode:
 * - referenciar-se propriedades do objeto dentro do closure.
 * -
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class Closures
{
    /**
     * Propriedade de uso geral
     * @var mixed $property1
     * Propriedade de uso geral
     */
    protected $property1;

    /**
     * Método retorna forma mais simples de closure de escopo de método.
     * @return callable
     * Método retorna forma mais simples de closure de escopo de método.
     */
    public function getClosure()
    {
        /* closure na sua forma mais simples, apenas retorna uma literal */
        return function () {
            return 'This closure is saying hi!';
        };
    }

    /**
     * Método Retorna closure que implementa recebimento de parâmetro.
     * @return callable
     * Método Retorna closure que implementa recebimento de parâmetro.
     */
    public function getClosureFeatParam()
    {
        /* closure recebe parâmetro, então o retorna */
        return function ($something) {
            return $something;
        };
    }

    /**
     * Retorna closure que implementa recebimento de parâmetro e atribui
     * à propriedade property1.
     * @return callable
     * Retorna closure que implementa recebimento de parâmetro e atribui
     * à propriedade property1.
     */
    public function getClosureFeatProperty()
    {
        /* closure recebe parâmetro, o atribui à propriedade da classe e retorna propriedade */
        return function ($something) {
            $this->property1 = $something;
            return $this->property1;
        };
    }

    /**
     * Retorna closure que recebe parâmetro, use e faz atribuição à propriedade
     * property1.
     * @return callable
     * Retorna closure que recebe parâmetro, use e faz atribuição à propriedade
     * property1.
     * @param string $beginPhrase
     * Parâmetro é usado na cláusula use do closure retornado pelo método.
     */
    public function getClosureFeatPropertyParam($beginPhrase)
    {
        /* método recebe parâmetro, que é atribuído ao closure, através do use,
         * o atribui à propriedade da classe e retorna propriedade */
        return function ($something) use ($beginPhrase) {
            $this->property1 = $beginPhrase.$something;
            return $this->property1;
        };
    }

    /**
     * Método seta valor da propriedade $property1
     * @return datatype description
     * @param datatype $content description
     */
    public function setProperty1($content)
    {
        $this->property1 = $content;
    }

    /**
     * Método retorna propriedade property1
     * @return callable
     * Método retorna propriedade property1
     */
    public function getProperty1()
    {
        return $this->property1;
    }
}
