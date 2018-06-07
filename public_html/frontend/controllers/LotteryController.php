<?php
namespace frontend\controllers;

use common\models\Betting;
use common\models\Lottery;
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

    public function actionIndex(){
        //решить по лотереям
        $lottery =  Lottery::find()->where(['status' => '1' ])->one();
        $lotteries = Lottery::find()->where(['status' => 1])->all();

        return $this->render('view',[
            'lottery' => $lottery
        ]);
    }

    public function actionView($id){

        $lottery = Lottery::findOne($id);

        return $this->render('view',[
            'lottery' => $lottery
        ]);
    }


    public function actionParticipate($id){

//        $user_id = \Yii::$app->user->identity->id;
//        $user = User::findOne($user_id);

        if(Yii::$app->user->isGuest){
            return $this->redirect('/site/login');
        }else{
            $lottery = Lottery::findOne($id);
            //реализовать принятия участия
            $betting = new Betting();
            $betting->user_id = Yii::$app->user->identity->id;
            $betting->target_id = $id;
            $betting->rate = $lottery->rate;
            //реализовать процентное распределение ставки
            $betting->pc_jackpot = 0;
            $betting->pc_keep = 0;
            $betting->pc_organizer = 0;
            $betting->pc_target = 0;
            $betting->pc_transaction = 0;
            $betting->save();
            Yii::$app->session->setFlash('success', 'Your bid is accepted');
            return $this->redirect('/cabinet/index');
        }

    }



}
