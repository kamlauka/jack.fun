<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <p>
        <?= Html::a('All banlist', ['/banlist/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('All betting', ['/betting/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('All transaction', ['/transaction/index'], ['class' => 'btn btn-success']) ?>
    </p>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'status'=>[
                'label' => 'Status',
                'class' => 'yii\grid\DataColumn',
                'value' => function ($data) {
                    if($data->status == 1){return 'Active';}
                    elseif($data->status == 0 ){return 'Waiting';}
                    elseif($data->status == 99 ){return 'Ban';}
                },

            ],
            //'created_at',
            //'updated_at',
            'phone',
            'type'=>[
                'label' => 'Type',
                'class' => 'yii\grid\DataColumn',
                'value' => function ($data) {
                    if($data->type == 1 ){return 'moderator';}
                        elseif($data->type == 2 ){return 'administrator';}
                            else{return 'gamer';}
                    },
            ],
            'balance',
            //'avatar',
            //'wallet',
            //'file',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
