<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Jackpot */

$this->title = 'Create Jackpot';
$this->params['breadcrumbs'][] = ['label' => 'Jackpots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jackpot-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
