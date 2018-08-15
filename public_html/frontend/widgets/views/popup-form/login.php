<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\widgets\PopupForm;

$this->title = PopupForm::t('messages','login');

?>
<div class="popup__login popup__content" >
    <div class="popup__close" onclick="closeForm()"></div>
    <h3 class="title-h3"><?= Html::encode($this->title) ?></h3>
    <p class="popup__other-popup"><?= PopupForm::t('messages','or ') ?> &nbsp;<span class="popup__other-popup-link" onclick="showForm('.popup__registration')"><?= PopupForm::t('messages','registration') ?></span></p>
    <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'action' => '/default/login',
            'enableAjaxValidation' => true,
    ]);
    ?>
    <label class="label">
        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'input-text'])->label('Username',['class'=>'label']) ?>
    </label>

    <label class="label">
        <?= $form->field($model, 'password')->passwordInput(['class'=>'input-text'])->label('password',['class'=>'label']) ?>
    </label>

    <span class="popup__forgot-pass"><?= PopupForm::t('messages','If you forgot your password you can &nbsp') ?><a onclick="showForm('.popup__password-reset')"><?= PopupForm::t('messages','reset it') ?></a></span>

    <?= Html::submitButton(PopupForm::t('messages','enter'), ['class' => 'button button_gold button_little', 'name' => 'signup-button']) ?>

    <?php ActiveForm::end(); ?>
</div>

