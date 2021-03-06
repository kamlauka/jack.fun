<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
    $this->title = 'Reset password';
?>

<div class="popup__password-reset popup__content">
    <div class="popup__close" onclick="closeForm()"></div>
    <h3 class="title-h3"><?= Html::encode($this->title) ?></h3>

    <p><?= Yii::t('messages','Please fill out your email. A link to reset password will be sent there.') ?></p>


            <?php $form = ActiveForm::begin([
                    'id' => 'request-password-reset',
                    'action'=> '/default/request-password-reset',
                    'enableAjaxValidation' => true,
            ]); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true,'class'=>'label__input input-text'])->label('Email',['class'=>'label']) ?>

    <br> <br>
                <?= Html::submitButton(Yii::t('messages','Send'), ['class' => 'button button_gold button_little']) ?>

            <?php ActiveForm::end(); ?>


</div>
