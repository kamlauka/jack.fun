<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Dispute */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dispute-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList(\common\models\Dispute::getListTypes()) ?>

    <?= $form->field($model, 'active')->dropDownList(['Активитовать','В одижание']) ?>

    <?= $form->field($model, 'executor_id')->textInput() ?>

    <?= $form->field($model, 'initiator_id')->textInput() ?>

    <?= $form->field($model, 'moderator_id')->textInput() ?>

    <?= $form->field($model, 'date_start')->textInput() ?>

    <?= $form->field($model, 'date_end')->textInput() ?>

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
