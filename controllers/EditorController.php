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


}