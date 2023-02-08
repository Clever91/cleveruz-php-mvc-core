<?php

namespace cleveruz\phpmvc\interface;

interface IDbModel
{
    public function attributes(): array;
    public function tableName(): string;
}
