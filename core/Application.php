<?php

namespace app\core;
/**
*Class Application
*
*
*/

class Application
{
    public static $app;
    public static $ROOT_DIR;
    public $router;
    public $request;
    public $responce;
    public $controller;
    public $db;
    public $session;
    public function __construct($rootPath,$config)
    {
        self::$app = $this;
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->responce = new Responce();
        $this->router = new Router($this->request, $this->responce);
        $this->db = new Database($config['db']);
        $this->session = new Session();
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}