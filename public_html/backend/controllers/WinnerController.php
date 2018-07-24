<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09.07.2018
 * Time: 16:54
 */

namespace backend\controllers;

use common\models\Betting;
use common\models\Lottery;
use common\models\User;
use yii\web\Controller;
use Yii;

class WinnerController extends Controller
{
    public static function actionSetWinnerLottery(){

        $activeLotteryObject = Lottery::getActiveLotteryObject();
        $allBetting = Betting::find()->select('user_id')->where(['target_id' => $activeLotteryObject->id])->asArray()->column();
        $winner_key = array_rand ($allBetting,1);
        $winner = User::find()->where(['id'=>$allBetting[$winner_key]])->one();
        $activeLotteryObject->result = $winner->id;
        $activeLotteryObject->status = 'Wait_participant';

        if($activeLotteryObject->save()){

            if($newActiveLottery = Lottery::find()->where(['status'=>'Next','result' => null])->one()){
            $newActiveLottery->status = 'Active';
            $newActiveLottery->save();
                return true;
            }else{
                Yii::$app->session->setFlash('success', '<p>Error</p> нет активных лотерей');
                return false;
            }


        }

        return false;

    }

}



