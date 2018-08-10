<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'our congratulations';

?>
<div class="popup__winner popup__content" >
    <div class="popup__close" onclick="closeForm()"></div>
    <h3 class="title-h3"><?= Html::encode($this->title) ?></h3>
    <p><?= Yii::t('messages','Lorem Ipsum is simply dummy text of the printing and typesetting industry.') ?></p>
    <img src="" alt="">
    <h2><?= Yii::t('messages','take your prize') ?></h2>
    <?php $form = ActiveForm::begin([
        'id' => 'get-prize',
        'action' => '/lottery/get-prize']);
    ?>

    <label class="label">
        <?= $form->field($model, 'phone')->textInput(['class'=>'input-text'])->label('Phone number',['class'=>'label']) ?>
    </label>

    <label class="label">
        <?= $form->field($model, 'file')->fileInput()->label('Upload a document confirming your identity ',['class'=>'label']) ?>
    </label>

    <?= Html::submitButton(Yii::t('messages','Get a win'), ['class' => 'button button_gold button_little', 'name' => 'signup-button']) ?>

    <?php ActiveForm::end(); ?>
</div>