<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09.07.2018
 * Time: 16:45
 */

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Betting;
use common\models\Lottery;
use Yii;

class BetController extends Controller
{
    public static function setLotteryBet(){

        $lottery = Lottery::getActiveLottery();

        $betting = new Betting();
        $betting->user_id = Yii::$app->user->identity->id;
        $betting->target_id = $lottery['data']->id;
        $betting->rate = $lottery['data']->rate;
        $betting->date_creation = date("Y-m-d h:i:s");
        $betting->pc_jackpot = 0;
        $betting->pc_keep = 0;
        $betting->pc_organizer = 0;
        $betting->pc_target = 0;
        $betting->pc_transaction = 0;
        return $betting->save();
        //todo реализовать процентное распределение ставки
    }
}