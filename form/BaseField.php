<?php
/**
 * @author AnilPulamiMagar
 * @Date 15/01/2022 1:21 pm
 * @Version 1.0
 *
 * Class BaseField
 *
 * @package app\core\form
 */

namespace app\core\form;

use app\core\Model;

abstract class BaseField
{
    public Model $model;
    public string $attribute;

    /**
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }
    abstract public function renderInput(): string;

    public function __toString(): string
    {
        return sprintf('
        <div class="col">
            <label>%s</label>
            %s
            <div class="invalid-feedback">
            %s
            </div>
        </div>        
        ',$this->model->getLabel($this->attribute),
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }
}