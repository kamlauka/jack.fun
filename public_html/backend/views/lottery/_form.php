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

    <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_ch')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_start')->widget(DateTimePicker::className(), [
        'language' => 'en',
        'size' => 'ms',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy.mm.dd hh:ii:ss',
            'todayBtn' => true
        ]
    ]);?>

    <?php
//    if($model->result){
    //        echo $form->field($model, 'result')->textInput();
    //    }
    ?>

    <?= $form->field($model, 'rate')->textInput() ?>

    <?= $form->field($model, 'description_ru')->textarea(['rows' => 5]) ?>
    <?= $form->field($model, 'description_en')->textarea(['rows' => 5]) ?>
    <?= $form->field($model, 'description_ch')->textarea(['rows' => 5]) ?>

    <?= $form->field($model, 'name_prize_ru')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_prize_en')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name_prize_ch')->textInput(['maxlength' => true]) ?>

    <?php
        if($model->img){ ?>
           <?= Html::img( $model->img) ?>
            <?= $form->field($model, 'img')->fileInput(['value'=> $model->img]) ?>
       <?php }else{
            echo $form->field($model, 'img')->fileInput();
        }
    ?>



    <?= $form->field($model, 'status')->dropDownList(['В ожидание','Публиковать']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
