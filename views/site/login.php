<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Логин';
$this->params['breadcrumbs'][] = $this->title;
?>

<link rel="stylesheet" type="text/css" href="/bmw/web/css/login.css">
<div class="wrapper">
    <div class="container">
    <h1>Добро пожаловать!</h1>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "<span>{input}</span> {error}",
                'options' => [
                    'tag' => false,
                ],
            ],
            'options' => [
                'class' => 'form'
             ]
        ]); ?>

            <?= $form->field($login_model, 'username',[
                'inputOptions'=>[
                    'class'=>'',
                    'placeholder'=>'Ваш никнейм'
                ]])->textInput()?>

            <?= $form->field($login_model, 'password',[
                'inputOptions'=>[
                    'class'=>'',
                    'placeholder'=>'Пароль'
                ]])->passwordInput() ?>
        <?= Html::submitButton('Войти', ['name' => 'login-button', 'id'=>'login-button']) ?>

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


