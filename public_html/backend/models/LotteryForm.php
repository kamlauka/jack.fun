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



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_ru', 'name_en','name_ch','date_start','description_ru','description_en','description_ch' ,'rate', 'name_prize_ru', 'name_prize_en', 'name_prize_ch', 'img', 'status'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
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
        $lottery->img = 'fgh';
        $dd = $lottery->save();


        $translations = new Language();
        $translations->language_id = 0;
        $translations->alias = $lottery->id;
        $translations->text = $this->name_ru;
        $translations->save();

        $translations = new Language();
        $translations->language_id = 1;
        $translations->alias = $lottery->id;
        $translations->text = $this->name_en;
        $translations->save();

        $translations = new Language();
        $translations->language_id = 2;
        $translations->alias = $lottery->id;
        $translations->text = $this->name_ch;
        $translations->save();

        $translations = new Language();
        $translations->language_id = 0;
        $translations->alias = $lottery->id;
        $translations->text = $this->description_ru;
        $translations->save();

        $translations = new Language();
        $translations->language_id = 1;
        $translations->alias = $lottery->id;
        $translations->text = $this->description_en;
        $translations->save();

        $translations = new Language();
        $translations->language_id = 2;
        $translations->alias = $lottery->id;
        $translations->text = $this->description_ch;
        $translations->save();

        $translations = new Language();
        $translations->language_id = 0;
        $translations->alias = $lottery->id;
        $translations->text = $this->name_prize_ru;
        $translations->save();

        $translations = new Language();
        $translations->language_id = 1;
        $translations->alias = $lottery->id;
        $translations->text = $this->name_prize_en;
        $translations->save();

        $translations = new Language();
        $translations->language_id = 2;
        $translations->alias = $lottery->id;
        $translations->text = $this->name_prize_ch;
        $translations->save();


    }


}
