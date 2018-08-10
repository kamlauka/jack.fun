<?php
namespace frontend\widgets;

use yii\base\Widget;
use common\models\Lottery;
use common\models\Modification;
use Yii;

class Infographics extends Widget {


    public function init()
    {
       parent::init();
       $this->registerTranslations();
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

    public function run()
    {
        echo $this->render('infographic/view.php');
    }


    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('widgets/' . $category, $message, $params, $language);
    }


}