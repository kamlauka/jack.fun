<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Eiting : ';
$this->params['breadcrumbs'][] = ['label' => 'Cabinet', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Eiting';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <a class="btn btn-success" href="change-password">Editing Passwoer</a>
    <div class="user-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?php // echo $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

        <?php // echo $form->field($model, 'auth_key_repeat')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'wallet')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'avatar')->fileInput() ?>

        <?= $form->field($model, 'file')->fileInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        <br>

    </div>

</div>
