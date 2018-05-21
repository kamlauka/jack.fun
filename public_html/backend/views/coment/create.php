<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Coment */

$this->title = 'Create Coment';
$this->params['breadcrumbs'][] = ['label' => 'Coments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
