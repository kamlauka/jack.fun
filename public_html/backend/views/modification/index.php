<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ModificationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modification-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php if (\Yii::$app->user->can('superAdmin')) { ?>
        <?= Html::a('Create Modification', ['create'], ['class' => 'btn btn-success']) ?>
        <?php } ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'name',
            'data',
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
