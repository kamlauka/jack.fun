<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bettings';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['/user/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="betting-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Betting', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'target_id',
            'rate',
            'date_creation',
            //'pc_target',
            //'pc_jackpot',
            //'pc_transaction',
            //'pc_keep',
            //'pc_organizer',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
