<?php
namespace frontend\widgets;

use yii\base\Widget;
use common\models\Lottery;
use common\models\Modification;

class PopupForm extends Widget {

    public $model;
    public $view;

    public function init()
    {

        parent::init();

         if($this->view === 'transaction'){

            $lottery = Lottery::getActiveLottery();
             $wallet = Modification::getAdminWallet();

             echo $this->render('popup-form/'.$this->view, [
                 'model' => $this->model,
                 'lottery' => $lottery['data']?$lottery['data']:'',
                 'wallet' => $wallet?$wallet:'',
             ]);

        }else{

             if($this->view ==='winner'){
                 $last_lottery = Lottery::find()->where(['status'=>'Wait_participant'])->one();

                 if(\Yii::$app->user->id == $last_lottery->result){?>

                    <script> onclick="showForm('.popup__transaction')" </script>
                     <?php
                 }
             }

            echo $this->render('popup-form/'.$this->view, ['model' => $this->model]);
        }
    }

}