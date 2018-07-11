<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 01.06.2018
 * Time: 17:03
 */

namespace frontend\components;

use common\models\Url;
use common\models\Language;
use Yii;

class RequestLoader
{
    public function __construct()
    {

        if (!Yii::$app->session->get('language')) {

            $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            $lang = Language::find()->where(['alias' => $lang])->one();
            if($lang){
                Yii::$app->session->set('language', $lang->id);
            }else
                Yii::$app->session->set('language', 2); //1 = РУС; 2 = EN; 3 = EN
            }

        $path = explode("/", \Yii::$app->request->pathInfo);
        if ($path[0] == 'lottery' || $path[0] == 'jackpot') {
            if (isset($path[1])){
                $object = Url::find()->where(['value' => $path[1]])->one();
                if ($object) {
                    header("Location: " . $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/lottery/view?id=" . $object->target_id);
                    exit();
                }
            }
        }

    }

}