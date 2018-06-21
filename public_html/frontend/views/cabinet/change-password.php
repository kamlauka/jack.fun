<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
/**
 * @var $model \frontend\models\ChangePasswordForm
 */
$this->title = 'change pass';
$form = ActiveForm::begin();
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="col-sm-6 col-sm-offset-3">
    <?= $form->field($model, 'password')->textInput(['class'=>'label__input input-text']); ?>
    <?= $form->field($model, 'password_repeat')->textInput(['class'=>'label__input input-text']); ?>
    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Save', ['class' => 'button button_gold']) ?>
    </div>

</div>
<?php ActiveForm::end(); ?>
