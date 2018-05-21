<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Banlist */

$this->title = 'Create Banlist';
$this->params['breadcrumbs'][] = ['label' => 'Banlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banlist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
