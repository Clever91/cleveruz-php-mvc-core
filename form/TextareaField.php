<?php

namespace cleveruz\phpmvc\form;

use cleveruz\phpmvc\Field;

class TextareaField extends Field
{
    public function mainContent(): string
    {
        return sprintf(
            '<textarea name="%s" class="form-control %s" rows="3">%s</textarea>',
            $this->attribute,
            $this->model->hasError($this->attribute) ? 'is-invalid' : '',
            $this->model->{$this->attribute}
        );
    }
}
