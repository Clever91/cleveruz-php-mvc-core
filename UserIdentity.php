<?php

namespace cleveruz\phpmvc;

use cleveruz\phpmvc\interface\IUserIdentity;

abstract class UserIdentity extends DbModel implements IUserIdentity
{

    protected function beforeSave(): bool
    {
        $this->encriptPassword();
        return parent::beforeSave();
    }

    public function primaryKey(): string
    {
        return "id";
    }

    public static function find(string $attribute, string $value): self | bool
    {
        return (new static)->findOne($attribute, $value);
    }
}
