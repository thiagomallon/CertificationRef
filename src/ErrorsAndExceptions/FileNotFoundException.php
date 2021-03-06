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
    public function __construct($message = 'File not found', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
