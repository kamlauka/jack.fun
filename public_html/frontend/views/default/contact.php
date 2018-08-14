<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="site-contact">
    <div class="grass"></div>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="stone-wrapper">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
<!--            name-->
            <div class="about-user-info__paragraph">
            <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'class'=>'label__input input-white'])->label('my email:',['class'=>'about-user-info__title']); ?>
            </div>
                <!--            email-->
            <div class="about-user-info__paragraph">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class'=>'label__input input-white'])->label('my email:',['class'=>'about-user-info__title']); ?>
            </div>
                <!--            subject-->
                <div class="about-user-info__paragraph">
            <?= $form->field($model, 'subject')->textInput(['maxlength' => true, 'class'=>'label__input input-white'])->label('my email:',['class'=>'about-user-info__title']); ?>
                </div>
                    <!--            textarea-->
                    <div class="about-user-info__paragraph">
            <?= $form->field($model, 'body')->textarea(['rows' => 15,'cols'=>'100', 'class'=>'label__input input-white'])->label('my email:',['class'=>'about-user-info__title']); ?>
                    </div>
            <?php //echo $form->field($model, 'verifyCode')->widget(Captcha::className(), [
            //'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            //]) ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'button button_gold', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

    <div class="clouds">
        <div class="cloud-container cloud-container_center-left-medium">
            <canvas class="canvas"></canvas>
        </div>
        <div class="cloud-container cloud-container_center-right-medium">
            <canvas class="canvas"></canvas>
        </div>
        <div class="cloud-container cloud-container_border-left-medium">
            <canvas class="canvas"></canvas>
        </div>
        <div class="cloud-container cloud-container_border-right-medium">
            <canvas class="canvas"></canvas>
        </div>
    </div>
</section>
