<?php
namespace backend\models;

use common\models\Language;
use Yii;
use yii\base\DynamicModel;
use yii\base\Model;

/**
 * создать модель для работы с переводимыми полями
 * эту и след. модели наследовать от той, что создашь
 */
class Translations extends DynamicModel
{

    protected function getTranslatable($attributes) {

        $langs = Language::getActiveLanguageObjects();

        foreach ($langs as $lang) {

            foreach ($attributes as $attribut)
            {
                $this->defineAttribute($lang->alias.'_'.$attribut);
                $this->addRule($lang->alias.'_'.$attribut,'required')->addRule($lang->alias.'_'.$attribut,'string');
            }

        }

    }



}
