<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ToteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Totes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tote-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tote', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'dispute_id',
            'user_id',
            'winner_id',
            'amount',

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
