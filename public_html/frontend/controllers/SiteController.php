<?php
namespace frontend\controllers;

use common\models\Jackpot;
use common\models\Language;
use common\models\Lottery;
use common\models\Translation;
use common\models\Url;
use Yii;
use yii\base\InvalidParamException;
use yii\helpers\Html;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
//    /**
//     * {@inheritdoc}
//     */
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout', 'signup'],
//                'rules' => [
//                    [
//                        'actions' => ['signup'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
//        ];
//    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        $lottery = Lottery::getActiveLottery();
        $jackpot = Jackpot::getActiveJackpot();
        $text = $this->getIndexInfo();

        return $this->render('index',[
           'lottery' => $lottery,
           'jackpot' => $jackpot,
           'text' => $text,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } elseif(!$model->validate()) {
// todo сделать рефакторинг метода
            $model->password = '';
            $lottery = Lottery::getActiveLottery();
            $jackpot = Jackpot::getActiveJackpot();
            $text = $this->getIndexInfo();

            Yii::$app->params['popup'] = 'login';
            Yii::$app->params[Yii::$app->params['popup']] = $model;

            return $this->render('index',[
                'lottery' => $lottery,
                'jackpot' => $jackpot,
                'text' => $text,

            ]);
        }
        return $this->redirect('/');
    }

    /**
     * Logs out the current user.
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


//    public function actionContact()
//    {
//        $model = new ContactForm();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
//                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
//            } else {
//                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
//            }
//
//            return $this->refresh();
//        } else {
//            return $this->render('contact', [
//                'model' => $model,
//            ]);
//        }
//    }


    public function actionAgreement()
    {
        return $this->render('agreement');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->signup()) {


               if($this->mail_activation ($user->email, $user->active)){
                   Yii::$app->session->setFlash('success', 'We sent you message to confirm email address.');
                   return $this->goHome();

               }

            }
            //если не прошел валидация
            $model->agreement = null;
        }

        Yii::$app->params['popup'] = 'signup';
        Yii::$app->params[Yii::$app->params['popup']] = $model;

        return $this->render('index');
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }
        Yii::$app->params['popup'] = 'password';
        Yii::$app->params['model'] = $model;

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionLanguage($lang){

        $lang =  Language::find()->where(['alias'=>$lang])->one();
        $_SESSION['language'] = $lang->id;

        return $this->redirect(Yii::$app->request->referrer);
    }

    protected function getIndexInfo(){

        $id_lang = $_SESSION['language'];

        $text = [];

        $text['T'] = Translation::find()->where(['alias' => 'main_T'])->andWhere(['language_id' => $id_lang])->one();
        $text['bitcoin'] = Translation::find()->where(['alias'=>'main_bitcoin','language_id' => $id_lang])->one();
        $text['hands'] = Translation::find()->where(['alias'=>'main_hands','language_id' => $id_lang])->one();
        $text['play'] = Translation::find()->where(['alias'=>'main_play','language_id' => $id_lang])->one();
        $text['prize'] = Translation::find()->where(['alias'=>'main_prize','language_id' => $id_lang])->one();
        $text['seo_block_title'] = Translation::find()->where(['alias' => 'seo_block_title', 'language_id' => $id_lang])->one();
        $text['seo_block_text'] = Translation::find()->where(['alias' => 'seo_block_text', 'language_id' => $id_lang])->one();

        return $text;
    }

    public function mail_activation ($email, $cod){

        $absoluteHomeUrl = \yii\helpers\Url::home(true); //http://сайт
        $serverName = Yii::$app->request->serverName; // сайт без http
        $url = $absoluteHomeUrl.'site/activation?code='.$cod;

        $msg = "Спасибо за регистрацию на сайте $serverName!  Вам осталось только подтвердить свой e-mail. Для этого перейдите по ссылке $url";

        $msg_html  = "<html><body style='font-family:Arial,sans-serif;'>";
        $msg_html .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Спасибо за регистрацию на сайте <a href='". $absoluteHomeUrl ."'>$serverName</a></h2>\r\n";
        $msg_html .= "<p><strong>Вам осталось только подтвердить свой e-mail.</strong></p>\r\n";
        $msg_html .= "<p><strong>Для этого перейдите по </strong><a href='". $url."'>этой ссылке</a></p>\r\n";
        $msg_html .= "</body></html>";

        Yii::$app->mailer->compose()
            ->setFrom('admin@terlabs.com') //не надо указывать если указано в common\config\main-local.php
            ->setTo($email) // кому отправляем - реальный адрес куда придёт письмо формата asdf @asdf.com
            ->setSubject('Подтверждение регистрации.') // тема письма
            ->setTextBody($msg) // текст письма без HTML
            ->setHtmlBody($msg_html) // текст письма с HTML
            ->send();
        return true;
    }

    public function actionActivation(){
        $code = Yii::$app->request->get('code');
        $code = Html::encode($code);
        $find = \common\models\User::find()->where(['active'=>$code])->one();
        if($find){
            $find->status = 1;
            if ($find->save()) {
                if (Yii::$app->getUser()->login($find)) {
                    Yii::$app->session->setFlash('success', '<p>Congratulations</p> You have successfully registered.');
                    return $this->goHome();
                }
            }
        }
        $absoluteHomeUrl = Url::home(true);
        return $this->redirect($absoluteHomeUrl, 303); //на главную
    }


}
