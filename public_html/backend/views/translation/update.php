<?php

use yii\helpers\Html;
use common\models\Language;
/* @var $this yii\web\View */
/* @var $model common\models\Translation */

$this->title = Yii::t('app', 'Update Translation: id = {nameAttribute} Language:{language}', [
    'nameAttribute' => $model->id,
    'language' => Language::findOne($model->language_id)->name,
]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Translations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="translation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
