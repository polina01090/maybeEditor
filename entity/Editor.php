<?php

namespace app\entity;

use yii\db\ActiveRecord;


class Editor extends ActiveRecord
{
    public static function tableName()
    {
        return 'pictures';
    }
}