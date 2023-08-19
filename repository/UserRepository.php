<?php


namespace app\repository;


use app\entity\Users;

class UserRepository
{
    public static function getUserById($id){
        return Users::find()->where(['id' => $id])->one();
    }
    public static function getUserByCondition($where){
        return Users::find()->where($where)->one();
    }
    public static function getUsersByCondition($where){
        return Users::find()->where($where)->all();
    }
    public static function changePassword($user_id, $newPassword){
        $user = self::getUserById($user_id);
        $user->password = password_hash($newPassword, PASSWORD_DEFAULT);
        $user->save();
    }
    public static function addUser($login, $password, $username){
        $user = new Users();
        $user->login = $login;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->username = $username;
        $user->save();
    }
}