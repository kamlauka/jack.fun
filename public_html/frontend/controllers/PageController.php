<?php
namespace frontend\controllers;

use common\models\Jackpot;
use common\models\Language;
use common\models\Lottery;
use common\models\Translation;
use common\models\Url;
use frontend\components\FrontController;
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
class PageController extends FrontController
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $lottery = Lottery::getInfoActiveLottery();
        $jackpot = Jackpot::getInfoActiveJackpot();
        $text = $this->getInfoIndex();

        return $this->render('index',[
           'lottery' => $lottery,
           'jackpot' => $jackpot,
           'text' => $text,
        ]);
    }

    /**
    * @return string
    */
    public function actionAgreement()
    {
        return $this->render('agreement');
    }

    /**
     * @return array
     */
    protected function getInfoIndex(){

        $id_lang = Language::getCurrent()->id;
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

    /**
     * @return string
     */

    public function actionsDefault()
    {
        return $this->render('error');
    }

}
