<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'LOGIN';
?>
<div class="site-login">
    <div class="login-form">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>
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

                <div class="log-elems">
                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    ]) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>

            </div>



            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
