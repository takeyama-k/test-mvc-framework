<?php

namespace app\models;
use app\core\UserModel;

class User extends UserModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;
    

    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public int $user_status = self::STATUS_ACTIVE;
    public string $password = '';
    public string $confirmpassword = '';

    public function rules() : array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL,[
                self::RULE_UNIQUE,
                'class' => self::class,
                'attribute' => 'email']
            ],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN,'min' => 8], [self::RULE_MAX,'max' => 30]],
            'confirmpassword' => [self::RULE_REQUIRED,[self::RULE_MATCH, 'match' => 'password']]
        ];
    }

    public static function tableName() : string
    {
        return  'users';
    }

    public function attributes() : array
    {
        return ['firstname', 'lastname' , 'email' , 'password', 'user_status'];
    }

    public function labels() : array
    {
        return [
            'firstname' => '姓', 'lastname' => '名', 'email' => 'メールアドレス', 'password' => 'パスワード', 'confirmpassword' => ''];
    }

    public function register()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return $this->save();
    }

    public static function primaryKey() : string
    {
        return 'id';
    }

    public function getDisplayName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}