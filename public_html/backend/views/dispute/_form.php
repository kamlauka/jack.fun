<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Dispute */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dispute-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'active')->dropDownList(['В одижание','Активитовать']) ?>

    <?= $form->field($model, 'date_start')->widget(DateTimePicker::className(), [
        'language' => 'en',
        'size' => 'ms',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy.mm.dd hh:ii:ss',
            'todayBtn' => true
        ]
    ]);?>

    <?= $form->field($model, 'date_end')->widget(DateTimePicker::className(), [
        'language' => 'en',
        'size' => 'ms',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy.mm.dd hh:ii:ss',
            'todayBtn' => true
        ]
    ]);?>

    <?php
        if($model->result){
            echo$form->field($model, 'result')->textInput();
        }
    ?>

    <?php
    if($model->status){
        echo$form->field($model, 'status')->textInput();
    }
    ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
