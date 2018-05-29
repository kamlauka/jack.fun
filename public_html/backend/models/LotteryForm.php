<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Language;
use common\models\Lottery;

/**
 * Login form
 */
class LotteryForm extends Model
{
    public $name_ru;
    public $name_en;
    public $name_ch;
    public $date_start;
    public $rate;
    public $description_ru;
    public $description_en;
    public $description_ch;
    public $name_prize_ru;
    public $name_prize_en;
    public $name_prize_ch;
    public $img;
    public $status;
    public $target_id;



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_en','name_ch','date_start','description_ru','description_en','description_ch' ,'rate', 'name_prize_ru', 'name_prize_en', 'name_prize_ch', 'img', 'status'], 'required'],
        [['target_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'name_ru' => 'Name text ru',
            'name_en' => 'Name text en',
            'name_ch' => 'Name text ch',
            'status' => 'Status',
            'date_start' => 'Date Start',
            'description_ru' => 'Description ru',
            'description_en' => 'Description en',
            'description_ch' => 'Description ch',
            'rate' => 'Rate',
            'name_prize_ru' => 'Name Prize ru',
            'name_prize_en' => 'Name Prize en',
            'name_prize_ch' => 'Name Prize ch',
            'img' => 'Img',
            'target_id' => 'target id',
        ];
    }

    public function saveve(){


        $lottery = new Lottery();

        $lottery->name = '...';
        $lottery->date_start = $this->date_start;
        $lottery->status = $this->status;
        $lottery->description = '...';
        $lottery->name_prize = '...';
        $lottery->rate = $this->rate;
        $lottery->img = 'hg';
        $lottery->save();

        $translations = new Language();
        $translations->language_id = 'ru';
        $translations->target_id = ''.$lottery->id;
        $translations->alias = 'name';
        $translations->text = $this->name_ru;
        $translations->save();
        $lottery->name = $translations->id.',';

        $translations = new Language();
        $translations->language_id = 'en';
        $translations->target_id = ''.$lottery->id;
        $translations->alias = 'name';
        $translations->text = $this->name_en;
        $translations->save();
        $lottery->name .= $translations->id.',';

        $translations = new Language();
        $translations->language_id = 'ch';
        $translations->target_id = ''.$lottery->id;
        $translations->alias = 'name';
        $translations->text = $this->name_ch;
        $translations->save();
        $lottery->name .= $translations->id.',';

        $translations = new Language();
        $translations->language_id = 'ru';
        $translations->target_id = ''.$lottery->id;
        $translations->alias = 'description';
        $translations->text = $this->description_ru;
        $translations->save();
        $lottery->description = $translations->id.',';

        $translations = new Language();
        $translations->language_id = 'en';
        $translations->target_id = ''.$lottery->id;
        $translations->alias = 'description';
        $translations->text = $this->description_en;
        $translations->save();
        $lottery->description .= $translations->id.',';

        $translations = new Language();
        $translations->language_id = 'ch';
        $translations->target_id = ''.$lottery->id;
        $translations->alias = 'description';
        $translations->text = $this->description_ch;
        $translations->save();
        $lottery->description .= $translations->id.',';

        $translations = new Language();
        $translations->language_id = 'ru';
        $translations->target_id = ''.$lottery->id;
        $translations->alias = 'prize';
        $translations->text = $this->name_prize_ru;
        $translations->save();
        $lottery->name_prize = $translations->id.',';

        $translations = new Language();
        $translations->language_id = 'en';
        $translations->target_id = ''.$lottery->id;
        $translations->alias = 'prize';
        $translations->text = $this->name_prize_en;
        $translations->save();
        $lottery->name_prize .= $translations->id.',';

        $translations = new Language();
        $translations->language_id = 'ch';
        $translations->target_id = ''.$lottery->id;
        $translations->alias = 'prize';
        $translations->text = $this->name_prize_ch;
        $translations->save();
        $lottery->name_prize .= $translations->id.',';
        $lottery->save();

    }

    public static function fill($lottery,$translations){

        $model = new LotteryForm();
        $model->name_ru = $translations;
        $model->name_en = $translations;
        $model->name_ch = $translations;
        $model->status = $lottery->status;
        $model->date_start = $lottery->date_start;
        $model->description_ru = $translations;
        $model->description_en = $translations;
        $model->description_ch = $translations;
        $model->rate;
        $model->name_prize_ru = $translations;
        $model->name_prize_en = $translations;
        $model->name_prize_ch = $translations;
        $model->img = $lottery->img;
        //$model->target_id = $lottery-> target_id;

      return $model;
    }



}
