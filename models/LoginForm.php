<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules() : array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }
    public function attributes() : array
    {
        return ['email' , 'password'];
    }
    public function labels() : array
    {
        return ['email' => 'メールアドレス', 'password' => 'パスワード'];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);
        if(!$user){
            $this->addError('email', 'このメールアドレス  '.$this->email . 'はユーザー登録されていません。');
            return false;
        }

        if(!password_verify($this->password, $user->password)){
            $this->addError('password', 'このパスワードは間違っています。');
            return false;
        }
        
        return Application::$app->login($user);
    }
}