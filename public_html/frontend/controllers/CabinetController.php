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

    public function actionEditing()
    {
//        return $this->render('index', [
//            'md5' => md5(Yii::$app->request->post('string'))
//        ]);

        if(!\Yii::$app->user->id){
           return $this->redirect(['index']);
        }

        $model = User::findOne(\Yii::$app->user->id);

        if(Yii::$app->request->isPjax){

            return $this->render('editing', [
                'model' => $model,
            ]);
        }

        if ($model->load(Yii::$app->request->post()) ) {
            if($model->validate()) {

                if ($img = UploadedFile::getInstance($model, 'avatar')) {

                    $img->saveAs(Yii::getAlias('@common/uploads/avatar/' . $img->baseName . '.' . $img->extension));
                    $model->avatar = '/../../common/uploads/avatar/' . $img->baseName . '.' . $img->extension;

                } else {
                    $model->avatar = $model->oldAttributes['avatar'];
                }
                $model->save();
                return $this->redirect(['index']);
            }
            //если ошибка
            Yii::$app->session->setFlash('success', 'Ошибка в валидации');
            return $this->redirect(['index']);
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionChangePassword() {

        if(!\Yii::$app->user->id){
            return $this->redirect(['index']);
        }

        $model = new ChangePasswordForm();

        if($model->load(Yii::$app->request->post())) {
          //  $hash = Yii::$app->getSecurity()->generatePasswordHash($model->passold);

            $user = User::findOne(\Yii::$app->user->id);

            if (Yii::$app->getSecurity()->validatePassword($model->passold, $user->password_hash)) {

                if($model->change()){

                    Yii::$app->session->setFlash('success', 'Your password has been successfully changed!');
                    return $this->redirect('/cabinet');

                }else{
                    Yii::$app->session->setFlash('success', 'Пароль не сохранен');
                    return $this->redirect('/cabinet');
                }


            } else {
                // неправильный пароль
                Yii::$app->session->setFlash('success', 'Ошибка в старом пароле');
                return $this->redirect('/cabinet');
            }

            } else {

            return $this->renderPartial('change-password', [
                'model' => $model,
            ]);

        }
    }


}
