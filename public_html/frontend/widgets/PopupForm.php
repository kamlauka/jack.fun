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

            parent::init();
            echo $this->render('popup-form/'.$this->view, [
                'model' => $this->model,
                'lottery' => $lottery['data']->rate,
                'lottery_id' => $lottery['data']->id,
                'wallet' => $wallet->data,
            ]);

        }else{

            echo $this->render('popup-form/'.$this->view, ['model' => $this->model]);
        }



    }

}