<?php
namespace frontend\widgets;

use common\models\Lottery;
use common\models\Modification;
use yii\base\Widget;


class PopupFormTransaction extends Widget {

    public $model;
    public $view;



    public function init()
    {
        $lottery = Lottery::getActiveLottery();
        $wallet = Modification::getAdminWallet();

        parent::init();
        echo $this->render('popup-form/'.$this->view, [
            'model' => $this->model,
            'lottery' => $lottery['data']->rate,
            'wallet' => $wallet->data,
        ]);

    }

}