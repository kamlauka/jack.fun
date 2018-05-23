<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Lottery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lottery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?php if($model->status){
        echo $form->field($model, 'status')->textInput();
    } ?>

    <?= $form->field($model, 'date_start')->textInput() ?>

    <?php if($model->result){
        echo $form->field($model, 'result')->textInput();
    } ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rate')->textInput() ?>

    <?= $form->field($model, 'name_prize')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
