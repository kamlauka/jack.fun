<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Dispute */

$this->title = 'Update Dispute:';
$this->params['breadcrumbs'][] = ['label' => 'Disputes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dispute-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
