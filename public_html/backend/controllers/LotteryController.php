<?php

namespace backend\controllers;

use common\models\Url;
use Yii;
use common\models\Lottery;
use backend\models\LotterySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\LotteryForm;
use yii\filters\AccessControl;

/**
 * LotteryController implements the CRUD actions for Lottery model.
 */
class LotteryController extends Controller
{

    protected $attributes = ['name','description','name_prize'];// переводимые поля на разные языки
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['index'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['create'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['update'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['view'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['delete'],
                    ],
                ],
            ],
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

        $model = new LotteryForm();
        $url = new Url();

        if ($model->load(Yii::$app->request->post()) && $url->load(Yii::$app->request->post())) {


            if($img = UploadedFile::getInstance($model, 'img')){

                $img->saveAs(  Yii::getAlias('@common/uploads/lottery/' . $img->baseName . '.' . $img->extension));
                $model->img = '/../../common/uploads/lottery/' . $img->baseName . '.' . $img->extension;
                if($url->target_id = $model->save($this->attributes)){

                    $url->type = 'lottery';
                    $url->save();
                }
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model'  => $model,
            'url' => $url,
            'attributes' => $this->attributes,
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

        $lottery = $this->findModel($id);
        $url = Url::find()->where(['target_id'=>$lottery->id,'type'=>'lottery'])->one();
        $model = LotteryForm::fill($lottery,$this->attributes);

        if ($model->load(Yii::$app->request->post())) {

            if($img = UploadedFile::getInstance($model, 'img')){

                $img->saveAs(  Yii::getAlias('@common/uploads/lottery/' . $img->baseName . '.' . $img->extension));
                $lottery->img = '/../../common/uploads/lottery/' . $img->baseName . '.' . $img->extension;

            }else{
                $lottery->img = $lottery->oldAttributes['img'];
            }

            if($model->update($lottery,$this->attributes,$model)){
                $url->load(Yii::$app->request->post());
                $url->save();
                return $this->redirect(['view', 'id' => $lottery->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'url' => $url,
            'attributes' => $this->attributes,

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
