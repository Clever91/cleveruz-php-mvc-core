<?php

namespace cleveruz\phpmvc;

use cleveruz\phpmvc\Router;
use cleveruz\phpmvc\Request;
use cleveruz\phpmvc\Response;

class Application
{
    public Database $db;
    public Router $router;
    public Controller $controller;
    public Session $session;
    public View $view;
    public ?UserIdentity $user;
    public static Application $app;
    public static string $ROOT_DIR;
    public array $config;
    public string $layout = "main";

    public function __construct(string $rootDir, array $config)
    {
        self::$app = $this;
        self::$ROOT_DIR = $rootDir;
        $this->router = new Router(new Request(), new Response());
        $this->db = new Database($config["db"]);
        $this->session = new Session();
        $this->view = new View();
        $this->config = $config;
        if ($this->session->has("userId")) {
            $this->user = $config["identity"]["class"]::find("id", $this->session->get("userId"));
        } else {
            $this->user = null;
        }
    }

    public function run(): void
    {
        try {
            echo $this->router->resolve();
        } catch (\Throwable $th) {
            $this->router->getResponse()->setStatusCode($th->getCode());
            echo $this->view->renderView("error", ["exception" => $th]);
        }
    }

    public function isGuest(): bool
    {
        return is_null($this->user);
    }

    public function login(UserIdentity $user)
    {
        $this->user = $user;
        $this->session->set("userId", $user->{$user->primaryKey()});
        return true;
    }
}
