<?php

namespace frontend\controllers;


use frontend\models\DisputeSearch;
use common\models\Dispute;
use frontend\components\FrontController;
use yii\base\DynamicModel;
use common\models\User;
use Yii;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;


/**
 * Lottery controller
 */
class DisputeController extends FrontController
{
    public function actionIndex()
    {
        $model = new DisputeSearch();
        $dataProvider = $model->search(Yii::$app->request->queryParams);

        $disputesDataProvider = new ActiveDataProvider([
            'query' => $dataProvider->query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'disputesDataProvider' => $disputesDataProvider,
            'searchModel' => $model,
        ]);

    }


    public function actionView($id)
    {
        $model = Dispute::findOne($id);

        return $this->render('view', [
            'model' => $model
        ]);
    }

    /**
     * @return \yii\web\Response
     * @throws \yii\base\InvalidConfigException
     */
    public function actionParticipate()
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect('/default/login');
        }

        $model = DynamicModel::validateData(array('hash'), [['hash', 'string', 'max' => 127]]);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if (TransactionController::setTransaction($model->hash)) {

                if (BetController::setDisputeBet()) {

                    Yii::$app->session->setFlash('success', '<p>Congratulations</p> Transaction has been send!');
                    return $this->redirect(Yii::$app->request->referrer);
                }
            }
        }

        Yii::$app->session->setFlash('success', '<p>Error</p> non-correcting hash string');
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * @return \yii\web\Response
     */
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
