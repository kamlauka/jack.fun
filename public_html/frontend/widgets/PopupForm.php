<?php
namespace frontend\widgets;

use yii\base\Widget;
use common\models\Lottery;
use common\models\Modification;
use Yii;

class PopupForm extends Widget {

    public $model;
    public $view;

    public function init()
    {

        parent::init();
        $this->registerTranslations();

         if($this->view === 'transaction'){

            $lottery = Lottery::getInfoActiveLottery();
             $wallet = Modification::getAdminWallet();

             echo $this->render('popup-form/'.$this->view, [
                 'model' => $this->model,
                 'lottery' => $lottery['data']?$lottery['data']:'',
                 'wallet' => $wallet?$wallet:'',
             ]);
//             echo "<script>showForm('.popup__transaction');</script>";


        }else{

             if($this->view ==='winner'){
                 $last_lottery = Lottery::find()->where(['status'=>'Wait_participant'])->one();

                 if(\Yii::$app->user->id == $last_lottery->result){
                     echo "<script>showForm('.popup__winner');</script>";
                 }
             }

            echo $this->render('popup-form/'.$this->view, ['model' => $this->model]);
        }
    }

    public function registerTranslations()
    {
        $i18n = Yii::$app->i18n;
        $i18n->translations['widgets/*'] = [
            'class'          => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath'       => '@frontend/widgets/messages',
            'fileMap'        => [
                'widgets/messages' => 'messages.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('widgets/' . $category, $message, $params, $language);
    }

}