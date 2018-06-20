<?php
namespace frontend\controllers;

use common\models\User;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;
use common\models\ChangePasswordForm;
use yii\web\UploadedFile;


/**
 * Site controller
 */
class CabinetController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index'],
                'rules' => [

                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $user_id = \Yii::$app->user->identity->id;
        $user = User::findOne($user_id);

        return $this->render('index',[
            'user'=>$user,
        ]);
    }

    public function actionEiting($id)
    {

        $model = User::findOne($id);

        if ($model->load(Yii::$app->request->post()) ) {

           if($img = UploadedFile::getInstance($model, 'avatar')){

               $img->saveAs(  Yii::getAlias('@common/uploads/avatar/' . $img->baseName . '.' . $img->extension));
               $model->avatar = '/../../common/uploads/avatar/' . $img->baseName . '.' . $img->extension;

           }else{
               $model->avatar = $model->oldAttributes['avatar'];

           }
            if( $img = UploadedFile::getInstance($model, 'file')){

                $img->saveAs(  Yii::getAlias('@common/uploads/document/' . $img->baseName . '.' . $img->extension));
                $model->avatar = '/../../common/uploads/document/' . $img->baseName . '.' . $img->extension;

            }else{

                $model->file = $model->oldAttributes['file'];

            }


            $model->save();
           return $this->redirect(['index']);
        }

        return $this->render('eiting', [
            'model' => $model,
        ]);

    }

    public function actionChangePassword() {
        $model = new ChangePasswordForm();
        if($model->load(Yii::$app->request->post()) && $model->change()) {
            Yii::$app->session->setFlash('success', 'Ваш пароль успешно изменен!');
            return $this->redirect('/cabinet');
        } else {
            return $this->render('change-password', [
                'model' => $model,
            ]);
        }
    }


}
