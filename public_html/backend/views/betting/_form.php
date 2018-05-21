<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Betting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="betting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'target_id')->textInput() ?>

    <?= $form->field($model, 'rate')->textInput() ?>

    <?= $form->field($model, 'pc_target')->textInput() ?>

    <?= $form->field($model, 'pc_jackpot')->textInput() ?>

    <?= $form->field($model, 'pc_transaction')->textInput() ?>

    <?= $form->field($model, 'pc_keep')->textInput() ?>

    <?= $form->field($model, 'pc_organizer')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
