<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LogeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'user_id',
            'target_id',
            'amount',
            'result',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{delete}',
                'buttons' => [

                    'delete' => function ($url,$model) {
                        if (!\Yii::$app->user->can('superAdmin')) {
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
