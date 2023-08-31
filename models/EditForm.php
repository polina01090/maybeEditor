<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "pictures".
 *
 * @property string $status
 * @property string $name
 *
 */
class EditForm extends Model
{

    public $status,$name;

    public function rules()
    {
        return [
            [['name','status'], 'required'],
        ];
    }
}
