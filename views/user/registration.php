<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var $model */
$this->title = 'Регистрация';
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>
<div class="site-login edit_form">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <label>Придумайте логин</label>
    <?= $form->field($model, 'login')->textInput()->label(false);?>
    <label>Придумайте пароль</label>
    <?= $form->field($model, 'password')->textInput()->label(false); ?>
    <label>Придумайте имя</label>
    <?= $form->field($model, 'username')->textInput()->label(false); ?>
    <div class="form-group">
        <?= Html::submitButton("Добавить", ['class' => 'add_form']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>