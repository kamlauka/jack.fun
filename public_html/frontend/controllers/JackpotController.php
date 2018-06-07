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

    public function actionIndex()
    {

        $model = Jackpot::find()->where(['status'=>1,'result'=>null])->one();

//      return $this->render('index',[ решить со страницей индекс

        return $this->render('view',[
            'model'=>$model
        ]);
    }

    public function actionView($id)
    {
        $model = Jackpot::findOne($id);

        return $this->render('view',[
            'model'=>$model
        ]);
    }


}
