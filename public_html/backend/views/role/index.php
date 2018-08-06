<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ToteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['/user/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tote-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php
        if (\Yii::$app->user->can('admin')) {
            echo Html::a('Create Role', ['create'], ['class' => 'btn btn-success']);
        }
    ?>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_id',
            'item_name',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url,$model) {
                        if (!\Yii::$app->user->can('admin')) {
                            return null;
                        }else{
                        return Html::a(
                            '<span class="glyphicon glyphicon-pencil"></span>',
                            $url);
                        }

                    },
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
