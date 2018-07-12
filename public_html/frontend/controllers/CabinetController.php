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
        $model = User::findOne($user_id);

        return $this->render('index',[
            'model'=>$model,
        ]);
    }

    public function actionEditing()
    {

        if(!\Yii::$app->user->id){
           return $this->redirect(['index']);
        }

        $model = User::findOne(\Yii::$app->user->id);

            if ($model->load(Yii::$app->request->post())) {
                if ($img = UploadedFile::getInstance($model, 'avatar')) {

                    $img->saveAs(Yii::getAlias('@common/uploads/avatar/' . $img->baseName . '.' . $img->extension));
                    $model->avatar = '/../../common/uploads/avatar/' . $img->baseName . '.' . $img->extension;

                } else {
                    $model->avatar = $model->oldAttributes['avatar'];
                }
                if($model->validate()) {
                    if($model->save()){
                        $gg = 'сохранил';
                    }
                    Yii::$app->session->setFlash('success', 'Your information has been successfully changed)');
                    return $this->redirect(['index']);
                }
                //если ошибка

               // return $this->redirect(['index']);
            }

        if(Yii::$app->request->isPjax){
            return $this->renderPartial('content/editing', [
                'model' => $model,
            ]);
        }else{
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

    public function actionChangePassword() {

        if(!\Yii::$app->user->id){
            return $this->redirect(['index']);
        }

        $model = new ChangePasswordForm();
        $user = User::findOne(\Yii::$app->user->id);

            if($model->load(Yii::$app->request->post())) {
                if ($user->validatePassword($model->passold)) {

                    $user->setPassword($model->password);
                    if($user->save()){

                        Yii::$app->mailer->compose()
                            ->setFrom('from@domain.com')
                            ->setTo('sd@terlabs.com')
                            ->setSubject('Тема сообщения')
                            ->setTextBody('Текст сообщения')
                            ->setHtmlBody('<b>текст сообщения в формате HTML</b>')
                            ->send();

                        Yii::$app->mailer->compose()
                        ->setTo('sd@terlabs.com')
                        ->setFrom('admin@terlabs.com')
                        ->setSubject('Пароль изменен!')
                        ->setTextBody('sdfswedf') // текст письма без HTML
                        ->setHtmlBody('sdfsdffsd') // текст письма с HTML
                        ->send();

                        $messageBody = "<p>Ваши доступы для входа в личный кабинет:$user->email</p>";
                        //письмо о смене пароля
                        Yii::$app->mailer->compose('/user_mail',[
                            'content' => $messageBody,
                            'page' => ' Добро пожаловать!'
                        ])
                            ->setTo($user->email)
                            ->setFrom('admin@terlabs.com')
                            ->setSubject('Регистрацsssия')
                            ->send();





                        Yii::$app->session->setFlash('success', 'Your password has been successfully changed!');
                        return $this->redirect('/cabinet');
                    }

                } else {
                        $model->addError('passold', 'Old password is not correct');
                }
            }
            if(Yii::$app->request->isPjax){
                return $this->renderPartial('content/change-password', [
                    'model' => $model,
                ]);

            }else{

                return $this->render('index', [
                    'model' => $model,
                ]);
            }


    }


}
