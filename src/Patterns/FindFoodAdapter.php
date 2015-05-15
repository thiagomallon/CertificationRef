<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @package App\Patterns
 */
namespace App\Patterns;

/**
 * Interface FindFoodAdapter - interface implementa padrão adapter - padroniza método de conseguir food
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
interface FindFoodAdapter
{
    public function getFood($food);
}
