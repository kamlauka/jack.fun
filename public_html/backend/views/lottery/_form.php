<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\TranslationForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LotteryForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lottery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'currency_start')->textInput() ?>

    <?= $form->field($model, 'rate')->textInput() ?>

    <?php
        if($model->img){ ?>
           <?= Html::img( $model->img) ?>
            <?= $form->field($model, 'img')->fileInput(['value'=> $model->img]) ?>
       <?php }else{
            echo $form->field($model, 'img')->fileInput();
        }
    ?>

    <?= $form->field($model, 'status')->dropDownList(\common\models\Lottery::getStatusList()); ?>

    <?= TranslationForm::widget([
        'attributes' => $attributes,
        'form' => $form,
        'model'=> $model

    ]) ?>

   <?= $form->field($url, 'value')->textInput()->label(' http://jackpot.fun/lottery/'); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
