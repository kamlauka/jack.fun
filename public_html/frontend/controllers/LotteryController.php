<?php
namespace frontend\controllers;

use common\models\User;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;


/**
 * Site controller
 */
class LotteryController extends Controller
{

    public function actionIndex()
    {
//        $user_id = \Yii::$app->user->identity->id;
//        $user = User::findOne($user_id);

        return $this->render('index');
    }




}
