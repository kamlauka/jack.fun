<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Translation;

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
//            'name'=>[
//                'label' => 'En name',
//                'class' => 'yii\grid\DataColumn',
//                'value' => function ($data) {
//
//                    $en_name = Translation::find()->where(['language_id'=>2,'target_id'=>$data->id,'alias'=>'name'])->one();
//                    return $en_name->text;
//
//                },
//            ],
            'total',
            'status',
            'currency_start',
            //'result',
//            'description:ntext'=>[
//                'label' => 'En description',
//                'class' => 'yii\grid\DataColumn',
//                'value' => function ($data) {
//
//                    $en_description = Translation::find()->where(['language_id'=>2,'target_id'=>$data->id,'alias'=>'description'])->one();
//                    return $en_description->text;
//
//                },
//            ],
            'rate',
//            'name_prize'=>[
//                'label' => 'En name prize',
//                'class' => 'yii\grid\DataColumn',
//                'value' => function ($data) {
//
//                    $en_name_prize = Translation::find()->where(['language_id'=>2,'target_id'=>$data->id,'alias'=>'name_prize'])->one();
//                    return $en_name_prize->text;
//
//                },
//            ],
//          //  'img',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
