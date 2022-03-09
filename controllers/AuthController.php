<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\User;

class AuthController extends Controller
{
    protected $layout = "auth";
    public function login($request)
    {
        return $this->render('login');
    }
    public function register($request)
    {
        $user = new User();
        if($request->isPost()){
            $user->loadData($request->getBody());
            if($user->validate() && $user->register() ){
                Application::$app->session->setFlash('success', 'ご登録いただきありがとうございます。');
                Application::$app->responce->redirect('/');
                exit;
            }
            return $this->render('register',[
                'model' => $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register',[
            'model' => $user
        ]);
    }
}