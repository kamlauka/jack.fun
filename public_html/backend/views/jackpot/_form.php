<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Jackpot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jackpot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['Публиковать', 'В ожидании']) ?>

    <?= $form->field($model, 'date_start')->widget(DateTimePicker::className(), [
        'language' => 'en',
        'size' => 'ms',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy.mm.dd hh:ii:ss',
            'todayBtn' => true
        ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
