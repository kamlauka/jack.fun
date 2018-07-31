<?php
namespace frontend\controllers;

use common\models\Jackpot;
use frontend\components\FrontController;

/**
 * Jackpot controller
 */
class JackpotController extends FrontController
{
      public function actionView()
    {

        $model = Jackpot::getInfoActiveJackpot();
        return $this->render('view',[
            'model'=>$model
        ]);
    }


}
