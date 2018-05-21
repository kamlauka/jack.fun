<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DisputeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dispute-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'img') ?>

    <?= $form->field($model, 'rate') ?>

    <?= $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'executor_id') ?>

    <?php // echo $form->field($model, 'initiator_id') ?>

    <?php // echo $form->field($model, 'moderator_id') ?>

    <?php // echo $form->field($model, 'date_start') ?>

    <?php // echo $form->field($model, 'date_end') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
