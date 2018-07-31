<?php

namespace frontend\controllers;


use common\models\Lottery;
use frontend\components\FrontController;
use yii\base\DynamicModel;
use common\models\User;
use Yii;
use yii\web\UploadedFile;


/**
 * Lottery controller
 */
class LotteryController extends FrontController
{

    public function actionView()
    {
        $lottery = Lottery::getInfoActiveLottery();

        return $this->render('view', [
            'lottery' => $lottery
        ]);
    }


    public function actionParticipate()
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect('/default/login');
        } else {

            $model = DynamicModel::validateData(array('hash'), [['hash', 'string', 'max' => 127]]);

            if ($model->load(Yii::$app->request->post()) && $model->validate()) {

                if (TransactionController::setTransact($model->hash)) {

                    if (BetController::setLotteryBet()) {

                        Yii::$app->session->setFlash('success', '<p>Congratulations</p> Transaction has been send!');
                        return $this->redirect(Yii::$app->request->referrer);
                    }
                }
            }else {
                Yii::$app->session->setFlash('success', '<p>Error</p> non-correcting hash string');
                return $this->redirect(Yii::$app->request->referrer);

            }
        }
    }

    public function actionGetPrize(){

        if(!\Yii::$app->user->id){
            return $this->redirect(['index']);
        }

        $model = new \yii\base\DynamicModel(['phone','file']);
        $model->addRule(['phone','file'], 'required')
              ->addRule('phone', 'string')
              ->addRule('file', 'file');

        if ($model->load(Yii::$app->request->post())) {

            if ($img = UploadedFile::getInstance($model, 'file')) {

                $img->saveAs(Yii::getAlias('@common/uploads/avatar/' . $img->baseName . '.' . $img->extension));
                $model->file = '/../../common/uploads/avatar/' . $img->baseName . '.' . $img->extension;

            } else {
                $model->file = $model->oldAttributes['file'];
            }

            if (User::setInfo($model->phone,$model->file)) {
                Yii::$app->session->setFlash('success', 'You will be contacted by a moderator');
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
        Yii::$app->session->setFlash('success', 'ERROR');
        return $this->redirect(Yii::$app->request->referrer);
    }

}
