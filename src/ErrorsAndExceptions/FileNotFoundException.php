<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\ErrorsAndExceptions
 */
namespace App\ErrorsAndExceptions;

/**
 * Class FileNotFoundException
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @coverageIgnore
 */
class FileNotFoundException extends \Exception
{
    // Redefine the exception so message isn't optional
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
