<?php

namespace app\models;

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
        ];
    }

}