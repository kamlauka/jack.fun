<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Tote */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tote-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'item_name')->dropDownList([\backend\models\Role::getItemList()]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
