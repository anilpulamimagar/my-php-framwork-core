<?php
/**
 * @author AnilPulamiMagar
 * @Date 15/01/2022 12:48 pm
 * @Version 1.0
 *
 * Class View
 *
 * @package anmoli\phpmvc
 */

namespace anmoli\phpmvc;

class View
{

    public string $title = '';

    public function renderView($view, $params = [])
    {
        $viewContent = $this->renderOnlyView($view, $params);
        $layoutContent = $this->layoutContent();

        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Application::$app->layout;
        if(Application::$app->controller){
            $layout = Application::$app->controller->layout;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params): bool|string
    {
        foreach ($params as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }
}