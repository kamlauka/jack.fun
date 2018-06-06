<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LotterySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lotteries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lottery-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lottery', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
           // 'total',
            'status',
            'currency_start',
            //'result',
            'description:ntext',
            'rate',
            'name_prize',
          //  'img',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
