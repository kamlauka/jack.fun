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
use yii\web\Controller;
use common\models\Betting;
use common\models\Lottery;

class BetController extends Controller
{
    /**
     * @return bool
     */
    public static function setLotteryBet(){

        if(Jackpot::addPercentFromLottery()){
            Log::setLog();//передать параметры для лога
            return true;
        }
        if(Betting::createNewBetLottery()){
            Log::setLog();//передать параметры для лога
            return true;
        }
        if(Lottery::addRate()){
            Log::setLog();//передать параметры для лога
            return true;
        }
        return false;
    }

    public static function setDisputeBet(){
        return true;
    }
}