<?php
use yii\widgets\ListView;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<?php
    $this->params['breadcrumbs'][] = ['label' =>'Disputes','template' => "<li class='crumbs__link crumbs__link_active'><a class='crumb-active'>{link}</a></li>"];
?>

        <section class="prize-page">
            <div class="prize-page-without-clouds prize-container container_mob mobile-container">
                <div class="jackpot-flex-gorizontal">
                    <div class="student-form">
                        <?php $form = ActiveForm::begin(['method' => 'get']); ?>
                        <?= 'name' ?>
                        <?= $form->field($searchModel, 'name')->textInput()->label('name');?>
                        <?= 'rate' ?>
                        <?= $form->field($searchModel, 'name')->textInput()->label('name');?>
                        <?= 'type' ?>
                        <?= $form->field($searchModel, 'type')->dropDownList(\common\models\Dispute::getListTypes()) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Apply', ['class' => 'btn btn-success']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                    <?= ListView::widget([
                        'dataProvider' => $disputesDataProvider,
                        'itemView' => '_dispute',
                        //'summary' => 'Показано {count} из {totalCount}',
                        'emptyText' => 'Список пуст',
                        'pager' => [
                            'firstPageLabel' => 'First',
                            'lastPageLabel' => '... Last',
                            'nextPageLabel' => false,
                            'prevPageLabel' => false,
                            'maxButtonCount' => 5,
                        ],
                        'sorter' => [
                            'attributes'=>['rate','id','type'],
                        ],
                        'layout' => "{sorter}\n{summary}\n{items}\n{pager}",

                    ]) ?>

                </div>

            </div>
        </section>

