<?php
/**
 * Created by Thiago Mallon
 */

/**
 * @subpackage App\ErrorsAndExceptions
 */
namespace App\ErrorsAndExceptions;

/**
 * Class FileLockedException
 * @author Thiago Mallon <thiagomallon@gmail.com>
 * @coverageIgnore
 */
class FileLockedException extends \Exception
{
    public function __construct($message = 'This file is locked', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
