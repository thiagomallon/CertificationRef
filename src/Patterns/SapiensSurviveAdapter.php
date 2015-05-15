<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @package App\Patterns
 */
namespace App\Patterns;

/**
 * Classe SapiensSurviveAdapter - Implementa padrão adapter. Sabemos que a forma de conseguir comida, pelo
 * ser humano, modou com o passar do tempo. Antes caçavamos, mas agora compramos a mesma em mercados e
 * conveniências. Da mesma forma uma api pode mudar o nome de seus métodos, sendo assim, cria-se um adapter.
 * A fonte para conseguir-se commida, pelos Sapiens, está no presente método getFood(), sempre que se
 * quiser adquirir comida, deve-se chamar o método getFood(), uma vez que se o método de conseguir comida
 * na classe MammalSurvive mudar, o único lugar de precisaremos alterar, será o método chamado da classe
 * MammalSurvive, que se encontra no presente método getFood().
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class SapiensSurviveAdapter implements FindFoodAdapter
{
    /**
     * Propriedade se faz instância de MammalSurvive
     * @var object $_mammalSurvive
     */
    protected $_mammalSurvive;

    /**
     * Método recebe e atribui objeto à propriedade $_mammalSurvive
     * @return datatype description
     * @param object $survive Parâmetro com type hinting, necessário ser objeto de MammalSurvive
     */
    public function __construct(MammalSurvive $survive) // hinting today.. not Quack Quack
    {
        $this->_mammalSurvive = $survive; // atribui objeto à propriedade
    }

    /**
     * Método
     * @return datatype description
     * @param datatype $food description
     */
    public function getFood($food)
    {
        $this->_mammalSurvive->hunt($food);
    }
}
