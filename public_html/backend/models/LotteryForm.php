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
class LotteryForm extends Translations
{

public function __construct()
{
    $this->getTranslatable(['name','description','name_prize']);

}

    public $currency_start;
    public $rate;
    public $img;
    public $status;
    public $target_id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currency_start', 'status'], 'required'],
            [['target_id'], 'number'],
            [['img',],'string'],
            [['rate'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'status' => 'Status',
            'currency_start' => 'Currency start',
            'rate' => 'Rate',
            'img' => 'Img',
            'target_id' => 'target id',
        ];
    }


    public function save($attributes){

        $lottery = new Lottery();
        $lottery->name = 'id = ';
        $lottery->currency_start = $this->currency_start;
        $lottery->status = $this->status;
        $lottery->description = 'id = ';
        $lottery->name_prize = 'id = ';
        $lottery->rate = $this->rate;
        $lottery->img = $this->img;
        $lottery->save();

        $langs = Language::getActiveLanguageObjects();

        foreach ($langs as $lang) {

            foreach ($attributes as $attribute)
            {
                $translations = new Translation();
                $translations->language_id = $lang->id;
                $translations->target_id = $lottery->id;
                $translations->alias = $attribute;
                $translations->text = $this->{$lang->alias.'_'.$attribute};
                $translations->save();
                $lottery->{$attribute} .= $translations->id.',';
            }

        }

        $lottery->save();
        return $lottery->id;

    }

    public static function fill($lottery,$attributes){

        $model = new LotteryForm();

        $model->currency_start = $lottery->currency_start;
        $model->status = $lottery->status;
        $model->rate = $lottery->rate;
        $model->img = $lottery->img;

        $langs = Language::getActiveLanguageObjects();

        foreach ($langs as $lang) {

            foreach ($attributes as $attribute)
            {
                $ob_text = Translation::find()->where(['language_id'=>$lang->id,'target_id'=>$lottery->id,'alias'=>$attribute])->select(['text'])->one();
                $model->{$lang->alias.'_'.$attribute} = $ob_text->text;
            }
        }

      return $model;
    }

    public static function update($lottery, $attributes, $model){

        $lottery->currency_start = $model->currency_start;
        $lottery->status = (string)$model->status;
        $lottery->rate = $model->rate;
       // $lottery->img = $model->img;
        $lottery->save();

        $langs = Language::getActiveLanguageObjects();

        foreach ($langs as $lang) {

            foreach ($attributes as $attribute)
            {
                $translations = Translation::find()->where(['language_id'=>$lang->id,'target_id'=>$lottery->id,'alias'=>$attribute])->one(); ;
                $translations->text = $model->{$lang->alias.'_'.$attribute};
                $translations->save();
            }
        }
        return $lottery->id;
    }

}
