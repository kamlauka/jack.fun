<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
/**
 * @var $model \frontend\models\ChangePasswordForm
 */
$this->title = 'change password';
$form = ActiveForm::begin([
    'action' => \yii\helpers\Url::toRoute(['change-password']),
    'id' => 'changePassword',
//    'enableAjaxValidation' => true,
//    // 'action' => \yii\helpers\Url::toRoute(['editing', 'id' => $model->id]),
//
//    'options' => [
//        'data-pjax' => true,
//    ],
]);
?>
<div id="change-password" class="user-form">
    <div class="user-form__editing-container">
<h1><?= Html::encode($this->title) ?></h1>
<div class="col-sm-6 col-sm-offset-3">
    <div class="about-user-info__paragraph">
    <?= $form->field($model, 'passold')->textInput(['type' => 'password','class'=>'label__input input-white'])->label('Old password',['class'=>'about-user-info__title']); ?>
    </div>
    <div class="about-user-info__paragraph">
    <?= $form->field($model, 'password')->textInput(['type' => 'password','class'=>'label__input input-white'])->label('New password',['class'=>'about-user-info__title']); ?>
    </div>
    <div class="about-user-info__paragraph">
    <?= $form->field($model, 'password_repeat')->textInput(['type' => 'password','class'=>'label__input input-white'])->label('Repeat new password',['class'=>'about-user-info__title']);; ?>
    </div>
    <div class="form-group">

        <a class="button button_dark button_several-nearby" href="/cabinet/editing" ><?= Yii::t('cabinet','Back') ?></a>
        <?= \yii\helpers\Html::submitButton('Save', ['class' => 'button button_gold button_several-nearby']) ?>
    </div>

</div>
    </div>

</div>
<?php ActiveForm::end(); ?>
