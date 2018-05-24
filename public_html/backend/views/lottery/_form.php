<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Lottery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lottery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_start')->widget(DateTimePicker::className(), [
        'language' => 'en',
        'size' => 'ms',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy.mm.dd hh:ii:ss',
            'todayBtn' => true
        ]
    ]);?>

    <?php if($model->result){
        echo $form->field($model, 'result')->textInput();
    } ?>

    <?= $form->field($model, 'rate')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>

    <?= $form->field($model, 'name_prize')->textInput(['maxlength' => true]) ?>

    <?php
        if($model->img){
            echo ' <img src= '.$model->img. '  >' ;
        }
    ?>

    <?= $form->field($model, 'img')->fileInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['В ожидание','Публиковать']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
