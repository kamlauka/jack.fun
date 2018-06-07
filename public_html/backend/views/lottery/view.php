<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Lottery */

$this->title = '№'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lotteries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lottery-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

            'name'=>[
                'label' => 'en name',
                'class' => 'yii\grid\DataColumn',
                'value' => function ($data) {

                $en_name = \common\models\Translation::find()->where(['language_id'=>2,'target_id'=>$data->id,'alias'=>'name'])->one();
                 return $en_name->text;

                },
            ],

            'total',
            'status',
            'currency_start',
            'result',
            'description:ntext'=>[
                'label' => 'en description',
                'class' => 'yii\grid\DataColumn',
                'value' => function ($data) {

                    $en_description = \common\models\Translation::find()->where(['language_id'=>2,'target_id'=>$data->id,'alias'=>'description'])->one();
                    return $en_description->text;

                },
            ],
            'rate',
            'name_prize'=>[
                'label' => 'en name prize',
                'class' => 'yii\grid\DataColumn',
                'value' => function ($data) {

                    $en_name_prize = \common\models\Translation::find()->where(['language_id'=>2,'target_id'=>$data->id,'alias'=>'name_prize'])->one();
                    return $en_name_prize->text;

                },
            ],
            'img',
        ],
    ]) ?>

</div>
