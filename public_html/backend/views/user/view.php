<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <?= Html::a('Betting', ['/betting/index'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Transaction', ['/transaction/index'], ['class' => 'btn btn-success']) ?>


    <h1>User №<?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            //'password_hash',
            'email:email',
            'status',
            'created_at',
            'updated_at',
            'phone',
            'type',
            'balance',
            'avatar',
            'wallet',
            'file',
        ],
    ]) ?>

</div>
