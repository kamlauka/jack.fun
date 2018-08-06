<?php
namespace frontend\controllers;

use common\models\Jackpot;
use common\models\Language;
use common\models\Lottery;
use common\models\Translation;
use common\models\Url;
use frontend\components\FrontController;
use frontend\models\ContactForm;
use Yii;
use yii\base\InvalidParamException;
use yii\helpers\Html;
use yii\web\BadRequestHttpException;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * Site controller
 */
class DefaultController extends FrontController
{
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
            return $this->redirect(Yii::$app->request->referrer);
        }

       // return $this->redirect('/');
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

     /**
     * Signs user up and confirm password.
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

               if($this->sendMailActivation($user->email, $user->active)){
                   Yii::$app->session->setFlash('success', 'We sent you message to confirm email address.');
                   return $this->goHome();
               }
            }
            //если не прошел валидацию
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


        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

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

    /**
     * @param $email
     * @param $cod
     * @return bool
     */
    public function sendMailActivation($email, $cod){

        $absoluteHomeUrl = \yii\helpers\Url::home(true); //http://сайт
        $serverName = Yii::$app->request->serverName; // сайт без http
        $url = $absoluteHomeUrl.'default/activation?code='.$cod;

        $msg = "Thank you for registering on the site $serverName!  You needed to confirm your e-mail. To do this, follow the link $url";

        $msg_html  = "<html><body style='font-family:Arial,sans-serif;'>";
        $msg_html .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Thank you for registering on the site <a href='". $absoluteHomeUrl ."'>$serverName</a></h2>\r\n";
        $msg_html .= "<p><strong>You needed to confirm your e-mail.</strong></p>\r\n";
        $msg_html .= "<p><strong>To do this, follow the link </strong><a href='". $url."'> link</a></p>\r\n";
        $msg_html .= "</body></html>";

        Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['adminEmail']) //не надо указывать если указано в common\config\main-local.php
            ->setTo($email) // кому отправляем - реальный адрес куда придёт письмо формата asdf@asdf.com
            ->setSubject('Confirmation of email address.') // тема письма
            ->setTextBody($msg) // текст письма без HTML
            ->setHtmlBody($msg_html) // текст письма с HTML
            ->send();
        return true;
    }

    /**
     * Login and active user.
     *
     * @return Response
     */
    public function actionGetMailActivation(){
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

    public function actionClearCache() {
        Yii::$app->cache->flush();
        Yii::$app->session->setFlash('success', 'Кэш очищен!');
        return $this->redirect(Yii::$app->request->referrer);
    }


    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }



}
