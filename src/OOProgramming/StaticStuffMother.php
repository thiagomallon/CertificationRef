<?php

/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\OOProgramming
 */
namespace App\OOProgramming;

/**
 * Classe StaticStuffMother implementa conceito de Late Static Binding
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
     * Método estático retorna valor de propriedade estática, realizando atribuição à mesma.
     * @return string
     */
    public static function getStaticProp()
    {
        return self::$staticProp = 'Mother scope';
    }

    /**
     * Método estático retorna valor do tipo string
     * @return string
     */
    public static function seeNeverYours()
    {
        return 'Mother scope, son';
    }

    /**
     * Método estático retorna valor do tipo string
     * @return string
     */
    public static function getCouldBeYours()
    {
        return 'Yet Mother scope, son';
    }

    /**
     * Método método implementa teste ao conceito de Late Static Bindings
     * @return string Retorna valor combinado de retornos dos métodos getCouldBeYours() e SeeNeverYours()
     */
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
