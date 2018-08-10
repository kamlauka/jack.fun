<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Participate';
?>

<div class="popup__transaction popup__content" >
    <div class="popup__close" onclick="closeForm()"></div>
    <h3 class="title-h3"><?= Html::encode($this->title) ?></h3>
    <?php $form = ActiveForm::begin([
        'id' => 'participate',
        'action' => '/lottery/participate']);
    ?>

    <p><?= Yii::t('messages','Send') ?> <b><?= isset($lottery->rate)?$lottery->rate:''?> ETH</b> <?= Yii::t('messages','on the wallet:') ?></p>
    <b> <?= isset($wallet->data)?$wallet->data:'' ?> </b>

    <label class="label">
        <?= $form->field($model, 'hash')->textInput(['class'=>'input-text'])->label('Transaction hash',['class'=>'label']) ?>
    </label>

    <?= Html::submitButton(Yii::t('messages','Enter'), ['class' => 'button button_gold button_little', 'name' => 'signup-button']) ?>

    <?php ActiveForm::end(); ?>
</div>