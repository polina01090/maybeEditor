<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/** @var $model */

?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'status')->dropdownList([0=>'публичный', 1=>'приватный']) ?>

    <div class="form-group">
        <?= Html::submitButton('Редактировать', ['class' => 'edit-picture']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>