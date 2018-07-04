<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Dispute */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Disputes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dispute-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-4">
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>

        <div class="col-md-4 col-md-offset-4">
            <p>
                <?= Html::a('Comment', ['/comment/index'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Tote', ['/tote/index'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>

    </div>




    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'img',
            'rate',
            'type',
            'active',
            'executor_id',
            'initiator_id',
            'moderator_id',
            'date_start',
            'date_end',
            'result',
            'status',
            'description:ntext',
        ],
    ]) ?>

</div>
