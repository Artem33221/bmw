<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<link rel="stylesheet" type="text/css" href="/bmw/web/css/login.css">
<div class="wrapper">
    <div class="container">
        <h1>Добро пожаловать!</h1>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "<span>{input}</span><span class=\"error\">{error}</span>",
                'options' => [
                    'tag' => false,
                ],
            ],
            'options' => [
                'class' => 'form'
            ]
        ]); ?>

        <?= $form->field($model, 'username',[
            'inputOptions'=>[
                'class'=>'',
                'placeholder'=>'Ваш никнейм'
            ]])->textInput()?>

        <?= $form->field($model, 'password',[
            'inputOptions'=>[
                'class'=>'',
                'placeholder'=>'Пароль'
            ]])->passwordInput() ?>
        <?= Html::submitButton('Зарегистрировать', ['name' => 'login-button', 'id'=>'login-button']) ?>

        <?php ActiveForm::end(); ?>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
