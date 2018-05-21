<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Betting */

$this->title = 'Create Betting';
$this->params['breadcrumbs'][] = ['label' => 'Bettings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="betting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
