<?php
/**
 * @author AnilPulamiMagar
 * @Date 14/01/2022 11:12 pm
 * @Version 1.0
 *
 * Class ForbiddenException
 *
 * @package app\core\exception
 */

namespace app\core\exception;

class ForbiddenException extends \Exception
{
    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;

}