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
            $lottery = $lottery['data'];
            parent::init();
            echo $this->render('popup-form/'.$this->view, [
                'model' => $this->model,
                'lottery' => $lottery->rate,
                'wallet' => $wallet,
            ]);

        }else{

            echo $this->render('popup-form/'.$this->view, ['model' => $this->model]);
        }



    }

}