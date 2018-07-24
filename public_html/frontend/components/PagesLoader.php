<?php

namespace frontend\components;

use common\models\Url;

class PagesLoader
{
    public function __construct()
    {
        $path = explode("/", \Yii::$app->request->pathInfo);
        if ($path[0] == 'lottery' || $path[0] == 'jackpot') {
            if (isset($path[1])) {
                $object = Url::find()->where(['type'=>$path[0], 'value' => $path[1]])->one();
                if ($object) {
                    header("Location: " . $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/".$path[0]."/view?id=" . $object->target_id);
                    exit();
                }
            }
        }
    }

}