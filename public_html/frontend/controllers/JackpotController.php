<?php
namespace frontend\controllers;

use common\models\Jackpot;
use frontend\components\FrontController;

/**
 * Site controller
 */
class JackpotController extends FrontController
{
      public function actionView()
    {

        $model = Jackpot::getActiveJackpot();
        return $this->render('view',[
            'model'=>$model
        ]);
    }


}
