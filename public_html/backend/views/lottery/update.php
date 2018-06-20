<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Lottery */

$this->title = 'Update Lottery:';
$this->params['breadcrumbs'][] = ['label' => 'Lotteries', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => , 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lottery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'url' => $url,
        'attributes' => $attributes,
    ]) ?>

</div>
