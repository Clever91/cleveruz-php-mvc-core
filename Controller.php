<?php

namespace cleveruz\phpmvc;

use cleveruz\phpmvc\Application;
use cleveruz\phpmvc\interface\IController;

class Controller implements IController
{
    public string $layout;
    protected array $middlewares = [];
    public string $action = "";

    public function __construct()
    {
        if (empty($this->layout))
            $this->layout = Application::$app->layout;
    }

    public function setLayout(string $layout): void
    {
        $this->layout = $layout;
    }

    public function render(string $view, array $params = []): string
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function redirect(string $url = '/'): void
    {
        header("Location: {$url}");
    }

    protected function registerMiddlewares(array $middlewares)
    {
        $this->middlewares = $middlewares;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}
