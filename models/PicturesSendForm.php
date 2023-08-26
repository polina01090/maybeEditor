<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "pictures".
 *
 * @property string $url
 * @property string $name
 *
 */
class PicturesSendForm extends Model
{

    public $url,$name;

    public function rules()
    {
        return [
            [['url', 'name'], 'required'],
        ];
    }
}
