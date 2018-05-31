<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Lottery */

$this->title = 'Update Lottery:';
$this->params['breadcrumbs'][] = ['label' => 'Lotteries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $lottery->id, 'url' => ['view', 'id' => $lottery->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lottery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="lottery-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($lottery, 'currency_start')->textInput();?>

        <?php
        //    if($model->result){
        //        echo $form->field($model, 'result')->textInput();
        //    }
        ?>

        <?= $form->field($lottery, 'rate')->textInput() ?>


        <?php
        if($lottery->img){ ?>
            <?= Html::img( $lottery->img) ?>
            <?= $form->field($lottery, 'img')->fileInput(['value'=> $lottery->img]) ?>
        <?php }else{
            echo $form->field($lottery, 'img')->fileInput();
        }
        ?>



        <?= $form->field($lottery, 'status')->dropDownList(['В ожидание','Публиковать']); ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>
