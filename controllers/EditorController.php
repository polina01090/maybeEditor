<?php


namespace app\controllers;


use app\entity\Users;
use app\repository\EditorRepository;
use app\repository\UserRepository;
use Yii;
use yii\web\Controller;

class EditorController extends Controller
{
    public function actionCreate()
    {
        return $this->render('create');
    }
    public function actionList(){
        $pictures = EditorRepository::getPicturesByCondition(['status' => 0]);
        $users = UserRepository::getUsersByCondition([]);
        $usersArray = [];
        foreach ($users as $user){
            $usersArray[$user->id] = $user->username;
        }
        return $this->render('list', [
            'pictures' => $pictures,
            'users' => $usersArray
        ]);
    }


}