<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Banlist */

$this->title = 'Update User Banlist:';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['/user/index']];
$this->params['breadcrumbs'][] = ['label' => 'Banlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="banlist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
