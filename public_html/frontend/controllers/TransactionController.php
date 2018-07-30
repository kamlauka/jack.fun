<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09.07.2018
 * Time: 16:54
 */

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Lottery;
use common\models\Transaction;
use Yii;

class TransactionController extends Controller
{
    public static function setTransact($hash){

        $lottery = Lottery::getActiveLotteryObject();

        $transaction = new Transaction();
        $transaction->user_id = Yii::$app->user->identity->id;
        $transaction->type = 'not confirmed';
        $transaction->target_id = $lottery->id;
        $transaction->amount = $lottery->rate;
        $transaction->hash = $hash;
       return $transaction->save();
    }


}



