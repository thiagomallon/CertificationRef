<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @package App\DesignPatterns
 */
namespace App\DesignPatterns;

/**
 * Interface FindFoodAdapter - interface implementa padrão adapter - padroniza método de conseguir food
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
interface FindFoodAdapter
{
    /**
     * Método
     * @return void
     * @param string $food
     */
    public function getFood($food);
}
