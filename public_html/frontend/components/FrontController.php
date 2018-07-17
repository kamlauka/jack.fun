<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 16.07.2018
 * Time: 15:44
 */

namespace frontend\components;

use Yii;
use common\models\Lottery;
use yii\web\Controller;

class FrontController extends Controller
{
    public function beforeAction($action)
    {

        if(Yii::$app->session->get('winner') != 0){
            if($last_lottery = Lottery::find()->where(['status'=>'Wait_participant', 'result' => Yii::$app->user->id])->one()){
              \Yii::$app->session->set('winner', $last_lottery->result);
                Yii::$app->params['popup'] = 'winner';
            };
        }
//        if(Yii::$app->cache->get('id_winner')){
//            if($last_lottery = Lottery::find()->where(['status'=>'Wait_participant', 'result' => Yii::$app->user->id])->one()){
//                \Yii::$app->cache->set('id_winner', $last_lottery->result);
//                Yii::$app->params['popup'] = 'winner';
//            };
//        }
        return true;
    }
}