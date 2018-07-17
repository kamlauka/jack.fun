<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\User */

//$this->title = 'Editing';
?>

<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="user-form">
        <div class="user-form__editing-container">
            <?php $form = ActiveForm::begin([
                'id' => 'editing',
                'options' => ['enctype' => 'multipart/form-data'],
                //'enableAjaxValidation' => true,
               // 'action' => \yii\helpers\Url::toRoute(['editing', 'id' => $model->id]),
              //  'action' => 'editing',
//                'options' => [
//                    'data-pjax' => 1,
//                ],

            ]); ?>

            <div class="user-info about-user-info__paragraph" >

                <div class="user-logo-wrap"><div class="user-logo-wrap__edit" onclick="EditAvatar()"></div></div>
                <div class="user-logo-container">
                    <?php if(isset($model->avatar)){
                        //если есть картинка
                        echo Html::img($model->avatar,['alt'=>"your logo", 'class'=>"user-logo about-user-info__user-logo"]);
                    } else{
                        //если нет картинки
                        echo '<img class="user-logo about-user-info__user-logo" src="../../images/cabinet/default-logo.png" alt="">';
                    }?>
                    <?= $form->field($model, 'avatar')->fileInput(['multiple'=>true]) ?>
                </div>

                <?php
                if(isset($model->username)){
                    echo Html::tag('p',$model->username,['class'=>'user-name about-user-info__user-name']);
                } ?>

            </div>
            <div class="about-user-info__paragraph">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'class'=>'label__input input-white'])->label('phone number:',['class'=>'about-user-info__title']); ?>
            </div>
            <div class="about-user-info__paragraph">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class'=>'label__input input-white'])->label('my email:',['class'=>'about-user-info__title']); ?>
            </div>


            <div class="form-group">

                <a class="button-link" href="/cabinet/change-password" id="edit-password" >Edit password</a>
                <a class="button button_dark button_several-nearby" href="/cabinet/index" >Back</a>
                <?= Html::submitButton('Save', ['class' => 'button button_gold button_several-nearby']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>

</div>
