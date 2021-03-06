<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DisputeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Disputes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dispute-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dispute', ['create'], ['class' => 'btn btn-success']) ?>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            //'img',
            'rate',
            'type',
            'active',
            //'executor_id',
            //'initiator_id',
            'moderator_id',
            'date_start',
            //'date_end',
            //'result',
            //'status',
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [

                    'delete' => function ($url,$model) {
                        if (!\Yii::$app->user->can('admin')) {
                            return null;
                        }else{
                            return Html::a(
                                '<span class="glyphicon glyphicon-trash"></span>',
                                $url);
                        }
                    },

                ],
            ],
        ],
    ]); ?>
</div>
