<?php

namespace app\models;

use app\repository\UserRepository;
use Yii;
use yii\base\Model;


class UserAdd extends Model
{
    public $login;
    public $password;
    public $username;

    public function rules()
    {
        return [
            [['login','password', 'username'], 'required', 'message' => 'Обязательно для заполнения'],
            [['login'], 'validateLogin']
        ];
    }
    public function validateLogin($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if (!empty(UserRepository::getUserByCondition(['login' => $this->login]))) {
                $this->addError($attribute, 'такой логин существует');
            }
        }
    }

}