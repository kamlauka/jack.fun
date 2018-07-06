<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
/**
 * @var $model \frontend\models\ChangePasswordForm
 */
$this->title = 'change password';
$form = ActiveForm::begin([
    'action' => \yii\helpers\Url::toRoute(['change-password']),
    'id' => 'editing',
    'enableAjaxValidation' => true,
    // 'action' => \yii\helpers\Url::toRoute(['editing', 'id' => $model->id]),

    'options' => [
        'data-pjax' => true,
    ],
]);
?>
<div class="user-form">
    <div class="user-form__editing-container">
<h1><?= Html::encode($this->title) ?></h1>
<div class="col-sm-6 col-sm-offset-3">
    <?= $form->field($model, 'passold')->textInput(['class'=>'label__input input-text'])->label('Old password',['class'=>'about-user-info__title']); ?>
    <?= $form->field($model, 'password')->textInput(['class'=>'label__input input-text'])->label('New password',['class'=>'about-user-info__title']); ?>
    <?= $form->field($model, 'password_repeat')->textInput(['class'=>'label__input input-text'])->label('Repeat new password',['class'=>'about-user-info__title']);; ?>
    <br>
    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Save', ['class' => 'button button_gold']) ?>
    </div>

</div>
    </div>

</div>
<?php ActiveForm::end(); ?>
