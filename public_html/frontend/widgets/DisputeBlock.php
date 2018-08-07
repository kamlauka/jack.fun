<?php
namespace frontend\widgets;

use common\models\Dispute;
use yii\widgets\ListView;
use common\models\User;

class DisputeBlock extends ListView {
       // public $dataProvider = null;
        //public $itemView = '/../widgets/views/dispute-block/index.php';
    public $layout = null;//виводим шадбон сами
    public $amount = 3 ;//количество штук споров по умолчанию
    public $defaultOrder = [];
    public $query = null;

    /**
     * @throws \yii\base\InvalidConfigException
     */
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

        /**
         * $disputeObjects Object
         * $initiatorObject Object
         * $executorObject Object
         */
        parent::init();

             if(!$this->dataProvider == null){
                    $disputeObjects = $this->dataProvider->getModels();
                    foreach ($disputeObjects as $disputeObject){
                        if($disputeObject->type == 0 ){
                            $executorObject = User::findIdentity($disputeObject->executor_id);
                            $initiatorObject = User::findIdentity($disputeObject->initiator_id);
                            echo $this->render('dispute-block/from_initiator.php', ['executorObject' => $executorObject,'initiatorObject' => $initiatorObject ,'disputeObject'=>$disputeObject ]);//от инициатора
                        }elseif($disputeObject->type == 1 ){
                            $executorObject = User::findIdentity($disputeObject->executor_id);
                            $initiatorObject = User::findIdentity($disputeObject->initiator_id);
                            echo $this->render('dispute-block/from_executor.php', ['executorObject' => $executorObject,'initiatorObject' => $initiatorObject ,'disputeObject'=>$disputeObject ]);//от испольнителя
                        }elseif($disputeObject->type == 2 ) {
                            $executorObject = User::findIdentity($disputeObject->executor_id);
                            $initiatorObject = User::findIdentity($disputeObject->initiator_id);
                            echo $this->render('dispute-block/from_administrator.php', ['executorObject' => $executorObject,'initiatorObject' => $initiatorObject , 'disputeObject' => $disputeObject]);//от админа
                        }
                    }
             }

    }

}