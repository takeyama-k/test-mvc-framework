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
    public $userClass;
    public $router;
    public $request;
    public $responce;
    public $controller;
    public $db;
    public $session;
    public $user;
    public function __construct($rootPath,$config)
    {
        self::$app = $this;
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->responce = new Responce();
        $this->router = new Router($this->request, $this->responce);
        $this->db = new Database($config['db']);
        $this->session = new Session();
        $this->userClass = $config['userClass'];
        $primaryValue = $this->session->get('user');
        if($primaryValue){
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        }
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

    public function run()
    {
        echo $this->router->resolve();
    }
    
    public function login($user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }
}