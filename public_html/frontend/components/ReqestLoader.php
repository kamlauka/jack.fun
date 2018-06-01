<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 01.06.2018
 * Time: 17:03
 */

namespace frontend\components;

use common\models\Url;

class ReqestLoader {

    public function __construct()
    {

        $pieces = explode("/", $_SERVER['REQUEST_URI']);
        if(isset($pieces[2])){
            $object = Url::find()->where(['value' => $pieces[2]])->one();
            if($object){
                header("Location: http://jackpot.loc/lottery/view?id=".$object->target_id   );
                exit();
            }
        }
    }

}