<?php

namespace cleveruz\phpmvc\middleware;

use cleveruz\phpmvc\Application;
use cleveruz\phpmvc\exception\ForbiddenException;
use cleveruz\phpmvc\Middleware;

class AuthMiddleware extends Middleware
{
    public function execute(): void
    {
        if (Application::$app->isGuest()) {
            $action = Application::$app->controller->action;
            if (empty($this->actions) || in_array($action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}
