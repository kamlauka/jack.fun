<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Participate';

?>
<div class="popup__transaction  <?php if((isset(Yii::$app->params['popup'])) and Yii::$app->params['popup'] == 'transaction' ) echo 'activ' ?>" >
    <div class="popup__close" onclick="$('.forms').hide()"></div>
    <h3 class="title-h3"><?= Html::encode($this->title) ?></h3>
    <?php $form = ActiveForm::begin([
        'id' => 'participate',
        'action' => '/lottery/participate']);
    ?>
    <p>Send <b><?=$lottery->rate?> ETH</b> on the wallet:</p>
    <b> <?= $wallet->data ?> </b>

    <label class="label">
        <?= $form->field($model, 'hash')->textInput(['class'=>'input-text'])->label('Transaction hash',['class'=>'label']) ?>
    </label>

    <?= Html::submitButton('Enter', ['class' => 'button button_gold button_little', 'name' => 'signup-button']) ?>

    <?php ActiveForm::end(); ?>
</div>