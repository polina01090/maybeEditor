<?php

namespace app\controllers;

use app\models\PicturesForm;
use Yii;
use yii\rest\Controller;

class SendController extends Controller
{
    public function actionSendImg(){
        $request = Yii::$app->request;
        $post = $request->post();
//        $model = new PicturesForm();
//        if ($model->load(Yii::$app->request->get(),'')){
//            return true;
//        }
        return print_r($request, true);

    }

}