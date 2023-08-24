<?php

namespace app\controllers;

use app\models\PicturesForm;
use app\models\PicturesSendForm;
use app\repository\EditorRepository;
use Yii;
use yii\rest\Controller;

class SendController extends Controller
{
    public function actionSendImg(){
        //$model = new PicturesSendForm();
        //
        //if ($model->load(Yii::$app->request->post(),'')){
        //    return print_r($model, true);
        //}
        $request = Yii::$app->request->post();
        EditorRepository::addPicture('Без названия', $request['url']);
        return print_r($request['url']);

    }

}