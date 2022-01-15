<?php
/**
 * @author AnilPulamiMagar
 * @Date 14/01/2022 11:01 pm
 * @Version 1.0
 *
 * Class BaseMiddleware
 *
 * @package anmoli\phpmvc\middlewares
 */

namespace anmoli\phpmvc\middlewares;

abstract class BaseMiddleware
{
    abstract public function execute();
}