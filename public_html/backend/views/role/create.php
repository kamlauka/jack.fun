<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Tote */

$this->title = 'Create Tote';
$this->params['breadcrumbs'][] = ['label' => 'Totes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tote-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
