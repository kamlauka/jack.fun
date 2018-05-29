<?php
namespace frontend\controllers;

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
//        $user_id = \Yii::$app->user->identity->id;
//        $user = User::findOne($user_id);

        $model = Lottery::find();


        return $this->render('index',[
            'model'=>$model
        ]);
    }




}
