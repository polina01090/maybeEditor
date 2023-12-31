<?php

namespace app\controllers;

use app\models\PicturesForm;
use app\models\PicturesSendForm;
use app\repository\EditorRepository;
use Yii;
use yii\rest\Controller;

class SendController extends Controller
{
    public function actionSendImg()
    {
        //$model = new PicturesSendForm();
        //
        //if ($model->load(Yii::$app->request->post(),'')){
        //    return print_r($model, true);
        //}
        $request = Yii::$app->request->post();
        $model = new PicturesSendForm();
        if ($model->load($request, '') && $model->validate()) {
            EditorRepository::addPicture($request['name'], $request['url']);
        }
        return $model;
    }
}