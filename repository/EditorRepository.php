<?php


namespace app\repository;


use app\entity\Editor;
use Yii;

class EditorRepository
{
    public static function getPictureById($id){
        return Editor::find()->where(['id' => $id])->one();
    }
    public static function getPictureAsArray($id){
        return Editor::find()->where(['id' => $id])->asArray()->one();
    }
    public static function getPicturesAsArray($where){
        return Editor::find()->where($where)->asArray()->all();
    }
    public static function getPictureByCondition($where){
        return Editor::find()->where($where)->one();
    }
    public static function getPicturesByCondition($where){
        return Editor::find()->where($where)->all();
    }
    public static function addPicture($name, $url){
        $user = new Editor();
        $user->name = $name;
        $user->url = $url;
        $user->user_id = Yii::$app->user->identity->id;
        $user->save();
    }
}