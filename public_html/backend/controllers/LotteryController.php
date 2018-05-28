<?php

namespace backend\controllers;

use common\models\Language;
use Yii;
use common\models\Lottery;
use backend\models\LotterySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\LotteryForm;

/**
 * LotteryController implements the CRUD actions for Lottery model.
 */
class LotteryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Lottery models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LotterySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lottery model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Lottery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
//        $model = new Lottery();
//
//        if ($model->load(Yii::$app->request->post())) {
//
//            if($img = UploadedFile::getInstance($model, 'img')){
//
//                $img->saveAs(  Yii::getAlias('@common/uploads/lottery/' . $img->baseName . '.' . $img->extension));
//                $model->img = '/../../common/uploads/lottery/' . $img->baseName . '.' . $img->extension;
//                $model->save();
//            }
//
//            return $this->redirect(['view', 'id' => $model->id]);
//        }

        $model = new LotteryForm();

        if ($model->load(Yii::$app->request->post())) {
            $model->saveve();
            return $this->redirect(['index']);
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Lottery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        $lotery = $this->findModel($id);
        $translations =  Language::findAll(['alias'=>$id]);

       // $model->scenario = 'update-photo-upload';

        if ($lotery->load(Yii::$app->request->post()) && $translations->load(Yii::$app->request->post()) ) {

            $img = UploadedFile::getInstance($lotery, 'img');
            $img->saveAs(  __DIR__ . '/../../common/uploads/lottery/'. $img->baseName . '.' . $img->extension);
            $lotery->img = __DIR__ . '/../../common/uploads/lottery/'. $img->baseName . '.' . $img->extension;
            if($lotery->save()){
                return $this->redirect(['view', 'id' => $lotery->id]);
            }


        }

        return $this->render('update', [
            'lotery' => $lotery,
            'translations' => $translations,
        ]);
    }

    /**
     * Deletes an existing Lottery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Lottery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lottery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lottery::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
