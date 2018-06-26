<?php
namespace frontend\controllers;

use common\models\Jackpot;
use common\models\Language;
use common\models\Lottery;
use common\models\Translation;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

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
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } elseif(!$model->validate()) {
            $model->password = '';
            $lottery = Lottery::getActiveLottery();
            $jackpot = Jackpot::getActiveJackpot();
            $text = $this->getIndexInfo();

//            Yii::$app->session->setFlash('error', 'Wrong password or username');
//            //доделалать  чтоб при переходе всплывал попап

            Yii::$app->params['popup'] = 'login';
            Yii::$app->params['model'] = $model;

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
        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {

                    Yii::$app->session->setFlash('success', 'You have successfully registered.');
                    return $this->goHome();

                }
            }
        }
        Yii::$app->params['popup'] = 'signup';
        Yii::$app->params['model'] = $model;
        return $this->render('index');
//        return $this->render('signup', [
//            'model' => $model,
//        ]);
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
        Yii::$app->params['popup'] = 'passwordReset';
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

}
