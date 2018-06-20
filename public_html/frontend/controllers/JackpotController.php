<?php
namespace frontend\controllers;

use common\models\Jackpot;
use common\models\Lottery;
use common\models\User;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;


/**
 * Site controller
 */
class JackpotController extends Controller
{

      public function actionView()
    {

        $model = Jackpot::getActiveJackpot();

        return $this->render('view',[
            'model'=>$model
        ]);
    }


}
