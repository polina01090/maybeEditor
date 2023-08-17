<?php


namespace app\controllers;


use Yii;
use yii\web\Controller;

class EditorController extends Controller
{
    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionSendImg(){
        $img = Yii::$app->request->post();
        return print_r($img, true);
    }
}