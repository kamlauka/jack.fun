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
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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

        //$language = $session->get('language');
        // $language = $session['language'];

        $language_alias = isset($_SESSION['language']) ? $_SESSION['language'] : $_SESSION['language'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        $language =  Language::find()->where(['alias'=>$language_alias])->one();

         $_SESSION['language'] = $language->id;

        $T = Translation::find()->where(['alias'=>'main_T','language_id'=>$_SESSION['language']])->one();
        $bitcoin = Translation::find()->where(['alias'=>'main_bitcoin','language_id'=>$_SESSION['language']])->one();
        $hands = Translation::find()->where(['alias'=>'main_hands','language_id'=>$_SESSION['language']])->one();
        $play = Translation::find()->where(['alias'=>'main_play','language_id'=>$_SESSION['language']])->one();
        $prize = Translation::find()->where(['alias'=>'main_prize','language_id'=>$_SESSION['language']])->one();


        if($lottery =  Lottery::find()->where(['status' => '1' ])->one()){
            $lottery_name_prize = Translation::find()->where(['alias'=>'name_prize','language_id'=>$_SESSION['language']])->one();
            $lottery_description = Translation::find()->where(['alias'=>'description','language_id'=>$_SESSION['language']])->one();
        }

        if($jackpot = Jackpot::find()->where(['status' => 1 ])->one()){

            $jackpot_description = Translation::find()->where(['alias' => 'jackpot_description', 'language_id' => $_SESSION['language']])->one();
        }

        $seo_block_title = Translation::find()->where(['alias' => 'seo_block_title', 'language_id' => $_SESSION['language']])->one();
        $seo_block_text = Translation::find()->where(['alias' => 'seo_block_text', 'language_id' => $_SESSION['language']])->one();

        return $this->render('index',[

           'T' => $T,
           'bitcoin' => $bitcoin,
           'hands' => $hands,
           'play' => $play,
           'prize' => $prize,
           'lottery' => $lottery,
           'lottery_name_prize' => $lottery_name_prize,
           'lottery_description' => $lottery_description,
           'jackpot' => $jackpot,
           'jackpot_description' => $jackpot_description,
           'seo_block_text' => $seo_block_text,
           'seo_block_title' => $seo_block_title,
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
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
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
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
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

        return $this->render('requestPasswordResetToken', [
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

        $session = Yii::$app->session;
        $lang =  Language::find()->where(['alias'=>$lang])->one();
        $session->set('language', $lang->id);
        return $this->redirect(Yii::$app->request->referrer);
    }
}
