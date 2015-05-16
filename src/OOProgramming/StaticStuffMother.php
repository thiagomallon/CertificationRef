<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @package App\OOProgramming
 */
namespace App\OOProgramming;

/**
 * Classe StaticStuffMother
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class StaticStuffMother
{
    /**
     * Propriedade estática
     * @var string $staticProp
     */
    protected static $staticProp;

    /**
     * Método estático
     * @return datatype description
     *
     */
    public static function getStaticProp()
    {
        return self::$staticProp = 'Mother scope';
    }

    /**
     * Método estático
     * @return datatype description
     */
    public static function seeNeverYours()
    {
        return 'Mother scope, son';
    }

    /**
     * Método estático
     * @return datatype description
     */
    public static function getCouldBeYours()
    {
        return 'Yet Mother scope, son';
    }

    public static function getStaticStuff()
    {
        return
        self::seeNeverYours() // a expressão sempre chamará ao método da classe atual, a classe mãe
        .' '.
        static::getCouldBeYours(); /* a expressão implementa o conceito de late static binding, observe
                                    * que invez de self::, utiliza-se aqui o static::. Graças ao late
                                    * static binding, as subclasses da classe atual, quando sobrescreverem
                                    * o método getCouldBeYours, chamarão a sua própria implementação do 
                                    * método, quando, também, chamarem o método presente (getStaticStuff)
                                    */
    }
}
