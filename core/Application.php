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
    public function __construct($rootPath)
    {
        self::$app = $this;
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->responce = new Responce();
        $this->router = new Router($this->request, $this->responce);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}