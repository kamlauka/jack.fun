<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';

?>
<div class="popup__login  <?php if((isset(Yii::$app->params['popup'])) and Yii::$app->params['popup'] == 'login' ) echo 'activ' ?>" >
    <div class="popup__close" onclick="$('.forms').hide()"></div>
    <h3 class="title-h3"><?= Html::encode($this->title) ?></h3>
    <p class="popup__other-popup">or &nbsp;<span class="popup__other-popup-link" onclick="showForm('.popup__registration')">registration</span></p>
    <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'action' => '/site/login',
            'enableAjaxValidation' => true,
    ]);
    ?>
    <label class="label">
        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'input-text'])->label('Username',['class'=>'label']) ?>
    </label>

    <label class="label">
        <?= $form->field($model, 'password')->passwordInput(['class'=>'input-text'])->label('password',['class'=>'label']) ?>
    </label>

    <span class="popup__forgot-pass">If you forgot your password you can <a onclick="showForm('.popup__password-reset')">reset it</a></span>

    <?= Html::submitButton('Enter', ['class' => 'button button_gold button_little', 'name' => 'signup-button']) ?>

    <?php ActiveForm::end(); ?>
</div>

