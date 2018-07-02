<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="popup__password-reset">
    <div class="popup__close" onclick="$('.forms').hide()"></div>
    <h3 class="title-h3"><?= Html::encode($this->title) ?></h3>
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
