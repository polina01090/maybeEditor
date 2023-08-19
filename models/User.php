<?php

namespace app\models;

use app\repository\UserRepository;
use yii\base\BaseObject;
use yii\web\IdentityInterface;

class User extends BaseObject implements IdentityInterface
{
    public $id;
    public $login;
    public $username;
    public $password;



    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user = new static(UserRepository::getUserById($id));
        if (!empty($user)){
            return new static($user);
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $login
     * @return static|null
     */
    public static function findByUsername($login)
    {
        $user = new static(UserRepository::getUserByCondition(['login'=>$login]));
        if (!empty($user)){
            return new static($user);
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return null;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return password_verify($password, $this->password);
    }
}
