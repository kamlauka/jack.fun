<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LotterySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lottery-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'total') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'date_start') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'rate') ?>

    <?php // echo $form->field($model, 'name_prize') ?>

    <?php // echo $form->field($model, 'img') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
