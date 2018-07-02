<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<<<<<<< HEAD
<div class="popup__password-reset">
    <div class="popup__close" onclick="$('.forms').hide()"></div>
    <h3 class="title-h3"><?= Html::encode($this->title) ?></h3>
=======
<div class="popup__password-reset  <?php if((isset(Yii::$app->params['popup'])) and Yii::$app->params['popup'] == 'password' ) echo 'activ' ?>">
    <h1><?= Html::encode($this->title) ?></h1>

>>>>>>> 7f2a8710ab33b63acf144287c0a282f519964d3e
    <p>Please fill out your email. A link to reset password will be sent there.</p>


            <?php $form = ActiveForm::begin([
                    'id' => 'request-password-reset-form',
                    'action'=> '/site/requestPasswordReset'
            ]); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true,'class'=>'label__input input-text'])->label('Email',['class'=>'label']) ?>

    <br> <br>
                <?= Html::submitButton('Send', ['class' => 'button button_gold button_little']) ?>

            <?php ActiveForm::end(); ?>


</div>
