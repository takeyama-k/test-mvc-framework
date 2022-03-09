<?php

namespace app\core\form;

class Field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';

    public $type = self::TYPE_TEXT;
    public $model;
    public $attribute;

    public function __construct($model, $attribute){
        $this->model=$model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf('
        <div class="form-group">
            <label>%s</label>
            <input type="%s" name="%s" value="%s" class="form-control%s">
            <div class="invalid-feedback">
                %s
            </div>
        </div>
        ',
        $this->model->getLabel($this->attribute) ?? $this->attribute,
        $this->type,
        $this->attribute,
        $this->model->{$this->attribute},
        $this->model->hasError($this->attribute) ? ' is-invalid' : '',
        $this->model->getFirstError($this->attribute));
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
}