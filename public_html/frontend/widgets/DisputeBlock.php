<?php
namespace frontend\widgets;

use common\models\Dispute;
use yii\widgets\ListView;

class DisputeBlock extends ListView {
       // public $dataProvider = null;
        //public $itemView = '/../widgets/views/dispute-block/index.php';
    public $layout = null;//виводим шадбон сами
    public $amount = 3 ;//количество штук споров по умолчанию
    public $defaultOrder = [];
    public $query = null;


     public function init()
    {

        $set = [
            'query' => $this->query?$this->query:$this->query = Dispute::find()->where(['active'=>1]),
            'pagination' => [
                'pageSize' => $this->amount,
            ],
            'sort'=>[
                'defaultOrder' => $this->defaultOrder
            ]
        ];


        $this->dataProvider = Dispute::getDisputeForMain($set);


        parent::init();

             if(!$this->dataProvider == null){
                    $models = $this->dataProvider->getModels();
                    foreach ($models as $model){
                        if($model->type == 0 ){
                            echo $this->render('dispute-block/from_initiator.php', ['view' => '','model'=>$model ]);//от инициатора
                        }elseif($model->type == 1 ){
                            echo $this->render('dispute-block/from_performer.php', ['view' => '','model'=>$model ]);//от испольнителя
                        }elseif($model->type == 2 ) {
                            echo $this->render('dispute-block/from_administrator.php', ['view' => '', 'model' => $model]);//от админа
                        }
                    }
             }

    }

}