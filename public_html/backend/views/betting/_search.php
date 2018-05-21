<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BettingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="betting-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'target_id') ?>

    <?= $form->field($model, 'rate') ?>

    <?= $form->field($model, 'pc_target') ?>

    <?php // echo $form->field($model, 'pc_jackpot') ?>

    <?php // echo $form->field($model, 'pc_transaction') ?>

    <?php // echo $form->field($model, 'pc_keep') ?>

    <?php // echo $form->field($model, 'pc_organizer') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
