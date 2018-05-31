<?php
use yii\widgets\ActiveForm;
/**
 * @var $model \frontend\models\ChangePasswordForm
 */
$this->title = 'change pass';
$form = ActiveForm::begin();
?>
<div class="col-sm-6 col-sm-offset-3">
    <?= $form->field($model, 'password')->textInput(); ?>
    <?= $form->field($model, 'password_repeat')->textInput(); ?>
    <div class="form-group">
        <?= \yii\helpers\Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

</div>
<?php ActiveForm::end(); ?>
