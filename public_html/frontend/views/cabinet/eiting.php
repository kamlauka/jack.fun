<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Eiting : ';
$this->params['breadcrumbs'][] = ['label' =>'Cabinet','template' => "<li class='crumbs__link crumbs__link_active'><span class='crumb-active'>{link}</span></li>"];

?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="user-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class'=>'label__input input-text']) ?>

        <?php // echo $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

        <?php // echo $form->field($model, 'auth_key_repeat')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class'=>'label__input input-text']) ?>

        <?= $form->field($model, 'wallet')->textInput(['maxlength' => true, 'class'=>'label__input input-text']) ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'class'=>'label__input input-text']) ?>

        <?= $form->field($model, 'avatar')->fileInput() ?>

        <?= $form->field($model, 'file')->fileInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'button button_gold']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        <br>
        <a class="button button_gold" href="change-password">Editing Passwoer</a>

    </div>

</div>
