<?php

namespace app\controllers;
use app\core\Controller;
use app\models\RegisterModel;

class AuthController extends Controller
{
    protected $layout = "auth";
    public function login($request)
    {
        return $this->render('login');
    }
    public function register($request)
    {
        $registerModel = new RegisterModel();
        if($request->isPost()){
            $registerModel->loadData($request->getBody());
            if($registerModel->validate() /* && $registerModel->register() */){
                return 'Success';
            }
            return $this->render('register',[
                'model' => $registerModel
            ]);
        }
        return $this->render('register',[
            'model' => $registerModel]
        );
    }
}