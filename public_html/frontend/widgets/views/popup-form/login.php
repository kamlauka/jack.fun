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
    <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'action' => '/site/login']);
    ?>
    <label class="label">
        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'input-text'])->label('Username',['class'=>'label']) ?>
    </label>

    <label class="label">
        <?= $form->field($model, 'password')->passwordInput(['class'=>'input-text'])->label('password',['class'=>'label']) ?>
    </label>

<<<<<<< HEAD
    <span class="popup__forgot-pass">If you forgot your password you can <a href="" onclick="showForm('.popup__password-reset')">reset it</a></span>
=======
    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
>>>>>>> 7f2a8710ab33b63acf144287c0a282f519964d3e
    <br> <br>

    <?= Html::submitButton('Enter', ['class' => 'button button_gold button_little', 'name' => 'signup-button']) ?>

    <?php ActiveForm::end(); ?>
</div>

