<?php
use yii\widgets\ListView;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<?php
//    $this->params['breadcrumbs'][] = ['label' =>'Disputes','template' => "<li class='crumbs__link crumbs__link_active'><a class='crumb-active'>{link}</a></li>"];
?>
<style>
    .checkk {
        display: block;
        padding: 2px 11px;
        border: 2px solid #5D6C6C;
        background-color: #5D6C6C;
    }
</style>
        <section class="popular__container">
            <div class=" container_mob mobile-container">
                <div class="lazy popular__block ">

                        <?php $form = ActiveForm::begin(['method' => 'get']); ?>
                    <p>
                        <?= 'Поиск' ?>
                        <?= $form->field($searchModel, 'name')->textInput();?>
                    </p>

                    <p>
                    <?= 'По дате' ?>
                    <p>
                        <?= $form->field($searchModel, 'date')->radioList(['day'=>'day','week'=>'week','month'=>'month']);?>

                    </p>
                    <p>
                        <?= 'type' ?>
                        <?= $form->field($searchModel, 'type')->radioList(['0'=>'initiator','1'=>'executor','2'=>'admin']) ?>
                    </p><p>
                        <?= 'Status' ?>
                        <?= $form->field($searchModel, 'status')->radioList(['1'=>'Не сформированй','2'=>'Сформированный','3'=>'В процесе исполнения']) ?>
                    </p>

                        <div class="form-group">
                            <?= Html::submitButton('Apply', ['class' => 'btn btn-success']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

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
                            'attributes'=>['rate','date_start','type','status'],
                        ],
                        'layout' => "{sorter}\n{items}\n{pager}",

                    ]) ?>

                </div>

            </div>
        </section>

