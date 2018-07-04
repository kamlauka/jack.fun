<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
/**
 * @var $model \frontend\models\ChangePasswordForm
 */
$this->title = 'change passwod';
$form = ActiveForm::begin([
    'action' => \yii\helpers\Url::toRoute(['change-password']),

]);
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="col-sm-6 col-sm-offset-3">
    <?= $form->field($model, 'passold')->textInput(['class'=>'label__input input-text'])->label('Old password'); ?>
    <?= $form->field($model, 'password')->textInput(['class'=>'label__input input-text'])->label('New password'); ?>
    <?= $form->field($model, 'password_repeat')->textInput(['class'=>'label__input input-text'])->label('Repeat new password');; ?>
    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Save', ['class' => 'button button_gold']) ?>
    </div>

</div>
<?php ActiveForm::end(); ?>
