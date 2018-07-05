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
                'action' => \yii\helpers\Url::toRoute(['editing', 'id' => $model->id]),
            ]); ?>

            <div class="user-info about-user-info__paragraph" >

                <div class="user-logo-wrap">
                    <div class="user-logo-container">
                        <?php if(isset($model->avatar)){
                            //если есть картинка
                            echo Html::img($model->avatar,['alt'=>"your logo", 'class'=>"user-logo about-user-info__user-logo"]);
                        } else{
                            //если нет картинки
                            echo '<img class="user-logo about-user-info__user-logo" src="../../images/cabinet/default-logo.png" alt="">';
                        }?>
                        <?= $form->field($model, 'avatar')->fileInput() ?>
                    </div>
                </div>


                <?php
                if(isset($user->username)){
                    echo Html::tag('p',$user->username,['class'=>'user-name about-user-info__user-name']);
                } ?>

            </div>





            <br>
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'class'=>'label__input input-text'])->label('my phone-number:',['class'=>'about-user-info__title']); ?>
            <?= $form->field($model, 'wallet')->textInput(['maxlength' => true, 'class'=>'label__input input-text'])->label('my wallet:',['class'=>'about-user-info__title']); ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class'=>'label__input input-text'])->label('my email:',['class'=>'about-user-info__title']); ?>




<br>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'button button_gold']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>

</div>
