<?php

namespace frontend\controllers;

use common\models\Betting;
use common\models\Lottery;
use frontend\controllers\TransactionController;
use common\models\Transaction;
use yii\base\DynamicModel;
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

    public function actionView()
    {

        $lottery = Lottery::getActiveLottery();

        return $this->render('view', [
            'lottery' => $lottery
        ]);
    }


    public function actionParticipate()
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login');
        } else {
            //todo закончить правильную реализацию DynamicModel
            $model = DynamicModel::validateData(array('hash'), [['hash', 'string', 'max' => 127, 'min' => 10]]);

            if ($model->load(Yii::$app->request->post())) {

                if (TransactionController::setTransact($model->hash)) {

                    if (BetController::setBet()) {

                        Yii::$app->session->setFlash('success', '<p>Congratulations</p> Transaction has been send!');
                        return $this->redirect(Yii::$app->request->referrer);
                    }
                }
            }
        }
    }

}
