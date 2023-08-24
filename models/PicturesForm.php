<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pictures".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property int $user_id
 *
 */
class PicturesForm extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pictures';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url', 'user_id'], 'required'],
        ];
    }
}
