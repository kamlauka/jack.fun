<?php
namespace backend\models;

use common\models\Lang;
use common\models\Translation;
use Yii;
use yii\base\DynamicModel;
use yii\base\Model;
use common\models\Language;
use common\models\Lottery;

/**
 * создать модель для работы с переводимыми полями
 * эту и след. модели наследовать от той, что создашь
 */
class TranslationForm extends Translations
{

public function __construct()
{
    $this->getTranslatable(['text']);
    self::$languages =  Language::getActiveLanguageObjects();
}
    public $target_id;
    public $alias;
    public static $languages;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'target_id','alias'], 'required'],
            [['target_id'], 'number'],
            [['alias',],'string'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'target_id' => 'target id',
            'alias' => 'Alias',
        ];
    }


    public function save($model, $attributes){

        foreach (self::$languages as $lang) {

            foreach ($attributes as $attribute)
            {
                $translations = new Translation();
                $translations->language_id = $lang->id;
                $translations->target_id = null;
                $translations->alias = $model->alias;
                $translations->text = $this->{$lang->alias.'_'.$attribute};
                $translations->save();
            }
        }
        return true;
    }
}
