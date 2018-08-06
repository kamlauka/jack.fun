<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\TranslationForm;

/* @var $this yii\web\View */
/* @var $model common\models\Translation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="translation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
    <?php if(isset($attributes)){

    echo TranslationForm::widget([
        'attributes' => $attributes,
        'form' => $form,
        'model'=> $model
        ]);
    }else{
        echo $form->field($model, 'text')->textarea(['rows' => 6]);
    } ?>




    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
