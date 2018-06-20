<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;

$this->title = 'Registration';
?>
<div class="site-signup">

    <div class="registration">
        <h3 class="registration__title title-h3"><?= $this->title ?></h3>
        <?php $form = ActiveForm::begin([
                'id' => 'form-signup',
                'action' => '/site/signup',
                ]); ?>
        <label class="label registration__label">
            <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'label__input input-text'])->label('Username',['class'=>'label__name']) ?>
        </label>
        <label class="label registration__label">
            <?= $form->field($model, 'wallet')->textInput(['class'=>'label__input input-text'])->label('wallet',['class'=>'label__name']) ?>
        </label>
        <label class="label registration__label">
            <?= $form->field($model, 'password')->passwordInput(['class'=>'label__input input-text'])->label('password',['class'=>'label__name']) ?>
           </label>
        <label class="label registration__label">
            <?= $form->field($model, 'password_repeat')->passwordInput(['class'=>'label__input input-text'])->label('repeat password',['class'=>'label__name']) ?>
        </label>
        <label class="label-for-checkbox registration__label" onclick="checkboxClick()">

            <?= $form->field($model, 'agreement')->checkbox(['value'=>1, 'uncheckValue'=>0,'class'=>'label-for-checkbox__checkbox checkbox']) ?>
            <div class="label-for-checkbox__wrap">
                <a class="pseudo-checkbox"></a>
                <span class="label-for-checkbox__name">I accept the <a class="white-link-underlining"  target="_blank" href="/site/agreement">Terms of agreement</a></span>
            </div>
        </label>

        <?= Html::submitButton('Signup', ['class' => 'button button_gold button_little registration__button ', 'name' => 'signup-button']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>



