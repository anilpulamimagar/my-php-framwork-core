<?php
/**
 * @author AnilPulamiMagar
 * @Date 14/01/2022 11:03 pm
 * @Version 1.0
 *
 * Class AuthMiddleware
 *
 * @package app\core\middlewares
 */

namespace app\core\middlewares;

use app\core\Application;
use app\core\exception\ForbiddenException;

class AuthMiddleware extends BaseMiddleware
{
    public array $actions =[];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    /**
     * @throws ForbiddenException
     */
    public function execute()
    {
        if(Application::isGuest()){
            if(empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)){
                throw new  ForbiddenException();
            }
        }
    }
}