<?php

namespace app\controllers;
use app\core\Controller;

class AuthController extends Controller
{
    protected $layout = "auth";
    public function login($request)
    {
        return $this->render('login');
    }
    public function register($request)
    {
        if($request->isPost()){
            return 'Handle Submitted Data';
        }
        return $this->render('register');
    }
}