<?php

namespace cleveruz\phpmvc;

use cleveruz\phpmvc\interface\IMiddleware;

abstract class Middleware implements IMiddleware
{
    protected array $actions;

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }
}
