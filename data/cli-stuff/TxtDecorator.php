<?php

/**
 * Created by Thiago Mallon.
 */

/**
 * @package CliStuff
 */
namespace CliStuff;

/**
 * Class TxtDecorator.
 *
 * @author Thiago Mallon <thiagomallon@gmail.com>
 */
class TxtDecorator
{
    protected static $fgColor = [
    'black' => '0;30',
    'darkgray' => '1;30',
    'blue' => '0;34',
    'light_blue' => '1;34',
    'green' => '0;32',
    'lightgreen' => '1;32',
    'cyan' => '0;36',
    'lightcyan' => '1;36',
    'red' => '0;31',
    'lightred' => '1;31',
    'purple' => '0;35',
    'lightpurple' => '1;35',
    'brown' => '0;33',
    'yellow' => '1;33',
    'lightgray' => '0;37',
    'white' => '1;37',
    ];

    protected static $bgColor = [
    'black' => '40',
    'red' => '41',
    'green' => '42',
    'yellow' => '43',
    'blue' => '44',
    'magenta' => '45',
    'cyan' => '46',
    'lightgray' => '47',
    ];

    // return decorated text
    public static function color($msg = 'We need a string value - by TxtDecorator', $fgrColor = null, $bgrColor = null)
    {
        // check and try to apply fg. color
        return ((array_key_exists($fgrColor, self::$fgColor))?
            "\033[".self::$fgColor[$fgrColor].'m': "\033[".self::$fgColor['blue'].'m').
        // check and try to apply bg. color
        ((array_key_exists($bgrColor, self::$bgColor))?
            "\033[".self::$bgColor[$bgrColor].'m': "\033[".self::$bgColor['lightgray'].'m').
        // concatenate msg
        $msg."\033[0m";
        
    }
}

//echo TxtDecorator::color('red', 'lightgray', 'Hello World!');
