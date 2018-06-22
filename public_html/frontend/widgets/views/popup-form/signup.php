<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registration';
?>
<div class="popup__registration">
    <h3 class="title-h3"><?= $this->title ?></h3>
    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'action' => '/site/signup',
    ]); ?>
    <label class="label">
        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'label__input input-text'])->label('Username',['class'=>'label__name']) ?>
    </label>
    <label class="label">
        <?= $form->field($model, 'wallet')->textInput(['class'=>'input-text'])->label('wallet',['class'=>'label__name']) ?>
    </label>
    <label class="label">
        <?= $form->field($model, 'password')->passwordInput(['class'=>'input-text'])->label('password',['class'=>'label__name']) ?>
    </label>
    <label class="label">
        <?= $form->field($model, 'password_repeat')->passwordInput(['class'=>'input-text'])->label('repeat password',['class'=>'label__name']) ?>
    </label>
    <label class="label-for-checkbox">

        <?= $form->field($model, 'agreement')->checkbox(['value'=>1, 'uncheckValue'=>0,'class'=>'label-for-checkbox__checkbox']) ?>
        <div class="label-for-checkbox__wrap">
            <a class="pseudo-checkbox" onclick="checkboxClick()"></a>
            <span class="label-for-checkbox__name">I accept the <a class="white-link-underlining"  target="_blank" href="/site/agreement">&nbsp Terms of agreement</a></span>
        </div>
    </label>

    <?= Html::submitButton('Signup', ['class' => 'button button_gold button_little', 'name' => 'signup-button']) ?>
    <?php ActiveForm::end(); ?>
</div>
