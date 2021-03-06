<?php

namespace anmoli\phpmvc\form;

use anmoli\phpmvc\Model;

class Form
{
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">',$action, $method);
        return new Form();
    }
    public static function end()
    {
        echo '</form>';
    }

    /**
     * @param Model $model
     * @param $attribute
     * @return InputField
     */
    public function field(Model $model, $attribute)
    {
        return new InputField($model, $attribute);
    }

}