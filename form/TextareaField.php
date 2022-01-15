<?php
/**
 * @author AnilPulamiMagar
 * @Date 15/01/2022 5:02 pm
 * @Version 1.0
 *
 * Class TextareaField
 *
 * @package app\core\form
 */

namespace app\core\form;


class TextareaField extends BaseField
{

    public function rules(): array
    {
        // TODO: Implement rules() method.
    }

    /**
     * @return string
     */
    public function renderInput(): string
    {
        return sprintf('<textarea name="%s" class="form-control%s">%s</textarea>',
            $this->attribute,
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->model->{$this->attribute},
        );
    }

}