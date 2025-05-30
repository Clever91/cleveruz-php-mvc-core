<?php

namespace cleveruz\phpmvc\interface;

interface IUserIdentity
{
    public function primaryKey(): string;
    public function encriptPassword(): void;
    public function validPassword(string $password): bool;
    public static function find(string $attribute, string $value): self | bool;
    public function displayName(): string;
}
