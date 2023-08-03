<?php


namespace app\controllers;


use yii\web\Controller;

class EditorController extends Controller
{
    public function actionCreate()
    {
        return $this->render('create');
    }
}