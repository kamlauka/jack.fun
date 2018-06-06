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

class ReqestLoader {

    public function __construct()
    {

        $language_alias = isset($_SESSION['language']) ? $_SESSION['language'] : $_SESSION['language'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        $language =  Language::find()->where(['alias'=>$language_alias])->one();
        $_SESSION['language'] = $language->id;

        $pieces = explode("/", $_SERVER['REQUEST_URI']);
        if(isset($pieces[2])){
            $object = Url::find()->where(['value' => $pieces[2]])->one();
            if($object){
                   header("Location: ".$_SERVER['REQUEST_SCHEME']."://". $_SERVER['SERVER_NAME']."/lottery/view?id=".$object->target_id   );
                exit();
            }
        }

    }

}