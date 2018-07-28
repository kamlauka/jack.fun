<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09.07.2018
 * Time: 16:45
 */

namespace frontend\controllers;

use common\models\Jackpot;
use common\models\Log;
use common\models\Modification;
use yii\web\Controller;
use common\models\Betting;
use common\models\Lottery;
use Yii;

class BetController extends Controller
{



    public static function setLotteryBet(){

        $lottery = Lottery::getActiveLottery();

        $pc_jackpot = Modification::find()->select('data')->where(['id'=>2,'name'=>'percent_jackpot'])->one();
        $pc_keep = Modification::find()->select('data')->where(['id'=>4,'name'=>'percent_admin'])->one();
        $pc_organizer = Modification::find()->select('data')->where(['id'=>5,'name'=>'percent_organizer_dispute'])->one();
        $pc_target = Modification::find()->select('data')->where(['id'=>1,'name'=>'percent_target'])->one();
        $pc_transaction = Modification::find()->select('data')->where(['id'=>3,'name'=>'percent_exchange'])->one();

        $pc_jackpot = $lottery['data']->rate /100 * $pc_jackpot->data;
        $pc_keep = $lottery['data']->rate/100 * $pc_keep->data;
        $pc_transaction = $lottery['data']->rate/100 * $pc_transaction->data;

        $active_jacpot = Jackpot::getActiveJackpot();
        $jackpot = Jackpot::findOne($active_jacpot['data']->id);
        $jackpot->total += $pc_jackpot;
        if($jackpot->save()){
            //$model  = new Log();
            //todo реализовать логи
        }

        $lotter = Lottery::findOne($lottery['data']->id);
        $lotter->total += $lottery['data']->rate - $pc_jackpot - $pc_keep - $pc_transaction;
        if($lotter->save()){
            //$model  = new Log();
            //todo реализовать логи
        }

        $betting = new Betting();
        $betting->user_id = Yii::$app->user->identity->id;
        $betting->target_id = $lottery['data']->id;
        $betting->rate = $lottery['data']->rate - $pc_jackpot - $pc_keep - $pc_transaction ;
        $betting->date_creation = date("Y-m-d h:i:s");
        $betting->pc_jackpot = $pc_jackpot;
        $betting->pc_keep = $pc_keep;
        $betting->pc_organizer = 0;
        $betting->pc_target = 0;
        $betting->pc_transaction = $pc_transaction;
        return $betting->save();

    }
}