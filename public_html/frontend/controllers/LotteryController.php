<?php
namespace frontend\controllers;

use common\models\Betting;
use common\models\Lottery;
use common\models\Modification;
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

    public function actionView(){

        $lottery = Lottery::getActiveLottery();

        return $this->render('view',[
            'lottery' => $lottery
        ]);
    }


    public function actionParticipate(){

//        $user_id = \Yii::$app->user->identity->id;
//        $user = User::findOne($user_id);

        if(Yii::$app->user->isGuest){
            return $this->redirect('/site/login');
        }else{

            $lottery = Lottery::getActiveLottery();
            //реализовать принятия участия
            $betting = new Betting();
            $betting->user_id = Yii::$app->user->identity->id;
            $betting->target_id = $lottery['data']->id;
            $betting->rate = $lottery['data']->rate;
            $betting->date_creation = date("Y-m-d h:i:s");
            //реализовать процентное распределение ставки

            $betting->pc_jackpot = 0;
            $betting->pc_keep = 0;
            $betting->pc_organizer = 0;
            $betting->pc_target = 0;
            $betting->pc_transaction = 0;



            if($betting->save()){
                Yii::$app->session->setFlash('success', '<p>Congratulations</p> Transaction has been send!');
                return $this->redirect(Yii::$app->request->referrer);
            }


            // реализовать форму

        }

    }



}
