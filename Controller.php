<?php

namespace anmoli\phpmvc;

use anmoli\phpmvc\middlewares\BaseMiddleware;

class Controller
{
    public String $layout = 'main';
    public string $action ='';

    /**
     * @var anmoli\phpmvc\middlewares\BaseMiddleware[]
     */
    protected array $middlewares = [];

    public function setLayout($layout)
    {
        $this->layout = $layout;

    }
    public function render($view, $params=[])
    {
        return Application::$app->view->renderView($view,$params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * @return anmoli\phpmvc\middlewares\BaseMiddleware[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }

}