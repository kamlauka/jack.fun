<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';

?>
<div id="sign-in-popup" onclick="targetFuncU(event)">

    <div class="registration">
        <h3 class="registration__title title-h3"><?= Html::encode($this->title) ?></h3>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <label class="label registration__label">
            <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'label__input input-text'])->label('Username',['class'=>'label__name']) ?>
        </label>

        <label class="label registration__label">
            <?= $form->field($model, 'password')->passwordInput(['class'=>'label__input input-text'])->label('password',['class'=>'label__name']) ?>
        </label>

        If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
        <br> <br>

        <?= Html::submitButton('Enter', ['class' => 'button button_gold button_little registration__button ', 'name' => 'signup-button']) ?>

        <?php ActiveForm::end(); ?>
    </div>







</div>
