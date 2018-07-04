<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Editing';

?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="user-form">
        <div class="user-form__editing-container">
            <?php $form = ActiveForm::begin([
                'id' => 'editing',
                'action' => \yii\helpers\Url::toRoute(['editing', 'id' => $model->id]),
            ]); ?>

            <?= $form->field($model, 'avatar')->fileInput() ?>
            <br>
            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class'=>'label__input input-text']) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class'=>'label__input input-text']) ?>

            <?= $form->field($model, 'wallet')->textInput(['maxlength' => true, 'class'=>'label__input input-text']) ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'class'=>'label__input input-text']) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'button button_gold']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>

</div>
