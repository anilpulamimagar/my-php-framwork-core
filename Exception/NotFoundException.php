<?php
/**
 * @author AnilPulamiMagar
 * @Date 14/01/2022 11:31 pm
 * @Version 1.0
 *
 * Class NotFoundException
 *
 * @package anmoli\phpmvc\exception
 */

namespace anmoli\phpmvc\exception;

class NotFoundException extends \Exception
{
    protected $message = 'Page not found';
    protected $code = 404;

}