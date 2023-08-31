<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var $model */
$this->title = 'Регистрация';

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>
<div class="site-login edit_form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="log-form">
        <h1 class="login-header"><?= Html::encode($this->title) ?></h1>
        <div class="login-elem">
            <img src="/images/login.png" alt="login">
            <?= $form->field($model, 'login')->textInput()->label(false) ?>
        </div>
        <div class="password-elem">
            <img src="/images/password.png" alt="password">
            <?= $form->field($model, 'password')->passwordInput()->label(false) ?>
        </div>
        <div class="login-elem">
            <img src="/images/login.png" alt="login">
            <?= $form->field($model, 'username')->textInput()->label(false) ?>
        </div>


        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>


    </div>

    <?php ActiveForm::end(); ?>
</div>