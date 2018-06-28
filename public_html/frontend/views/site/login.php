<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';

?>
<div class="popup__registration">
    <h3 class="registration__title title-h3"><?= Html::encode($this->title) ?></h3>
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    <label class="label">
        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'input-text'])->label('Username',['class'=>'label']) ?>
    </label>

    <label class="label">
        <?= $form->field($model, 'password')->passwordInput(['class'=>'input-text'])->label('password',['class'=>'label']) ?>
    </label>

    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>
    <br> <br>

    <?= Html::submitButton('Enter', ['class' => 'button button_gold button_little', 'name' => 'signup-button']) ?>

    <?php ActiveForm::end(); ?>
</div>

