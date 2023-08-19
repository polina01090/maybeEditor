<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "pictures".
 *
 * @property string $url
 *
 */
class PicturesSendForm extends Model
{

    public $url;

    public function rules()
    {
        return [
            [['url'], 'required'],
        ];
    }
}
