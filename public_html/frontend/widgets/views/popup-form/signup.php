<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\widgets\PopupForm;

$this->title = PopupForm::t('messages','registration');
?>

<div class="popup__registration popup__content" >
    <div class="popup__close"  onclick="closeForm()"></div>
    <h3 class="title-h3"><?= $this->title ?></h3>
    <p class="popup__other-popup"><?= PopupForm::t('messages','or &nbsp') ?><span class="popup__other-popup-link" onclick="showForm('.popup__login')"><?= Yii::t('messages','login') ?></span></p>
    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'action' => '/default/signup',
        'enableAjaxValidation' => true,

//        'options' => [
//            'onsubmit' => 'sendAjax(this, myAction)'
//        ],
    ]); ?>
    <label class="label">
        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'label__input input-text'])->label('Username',['class'=>'label']) ?>
    </label>
    <label class="label">
        <?= $form->field($model, 'email')->textInput(['class'=>'input-text'])->label('email',['class'=>'label']) ?>
    </label>
    <label class="label">
        <?= $form->field($model, 'password')->passwordInput(['class'=>'input-text'])->label('password',['class'=>'label']) ?>
    </label>
    <label class="label">
        <?= $form->field($model, 'password_repeat')->passwordInput(['class'=>'input-text'])->label('repeat password',['class'=>'label']) ?>
    </label>
    <label class="label-for-checkbox">

        <?= $form->field($model, 'agreement')->checkbox(['class'=>'label-for-checkbox__checkbox'])->label(null,['class'=>' input-hidden']) ?>
        <div class="label-for-checkbox__wrap">
            <a class="pseudo-checkbox" onclick="checkboxClick()"></a>
            <span class="label-for-checkbox__name"><?= PopupForm::t('messages','I accept the &nbsp ') ?><a class="white-link-underlining"  target="_blank" href="/pages/agreement"><?= PopupForm::t('messages','Terms of agreement') ?></a></span>
        </div>
    </label>

    <?= Html::submitButton('Signup', ['class' => 'button button_gold button_little', 'id'=>'signup_button', 'name' => 'signup-button']) ?>
    <?php ActiveForm::end(); ?>
</div>
