<?php

namespace anmoli\phpmvc;

/**
 * class Request
 * @author Anil Pulami Magar
 * @package anmoli\phpmvc
 */
class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        if($position === false) return $path;

        $path = substr($path,0,$position);
        return $path;
//        echo '<pre>';
//        var_dump($path);
//        echo '</pre>';
    }

    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet(): string
    {
        return $this->method() === 'get';
    }

    public function isPost(): string
    {
        return $this->method() === 'post';
    }

    public function getBody(): array
    {
//        echo '<pre>';
//        var_dump($_POST);
//        echo '</pre>';
        $body =[];

        if($this->method() === 'get'){
            foreach ($_GET as $key => $value){
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($this->method() === 'post'){
            foreach ($_POST as $key => $value){
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;

    }

}