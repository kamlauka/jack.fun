<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09.07.2018
 * Time: 16:45
 */

namespace frontend\controllers;

use common\models\Jackpot;
use common\models\Modification;
use yii\web\Controller;
use common\models\Betting;
use common\models\Lottery;
use Yii;

class BetController extends Controller
{
    public static function setLotteryBet(){

        Jackpot::addPercentFromLottery();
        Lottery::addRate();
        Betting::createNewBetLottery();

        return true;

    }
}