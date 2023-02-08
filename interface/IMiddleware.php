<?php

namespace cleveruz\phpmvc\interface;

interface IMiddleware
{
    public function execute(): void;
}
