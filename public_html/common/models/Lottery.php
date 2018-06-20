<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lottery".
 *
 * @property int $id
 * @property string $name
 * @property int $total
 * @property int $status
 * @property string $currency_start
 * @property string $result
 * @property string $description
 * @property double $rate
 * @property string $name_prize
 * @property string $img
 */
class Lottery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lottery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'currency_start', 'rate', 'name_prize', 'img'], 'required'],
           // [['img'],'image','extensions' => 'png, jpg, jpeg, gif','skipOnEmpty' => true, 'on' => 'update-photo-upload'],
            [['total'], 'integer'],
            [['description'], 'string'],
            [['rate','currency_start'], 'number'],
            [['name', 'name_prize'], 'string', 'max' => 32],
            [['status'], 'string', 'max' => 2],
            [['result'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'total' => 'Total',
            'status' => 'Status',
            'currency_start' => 'Currency start',
            'result' => 'Result',
            'description' => 'Description',
            'rate' => 'Rate',
            'name_prize' => 'Name Prize',
            'img' => 'Img',
        ];
    }

    public static function getActiveLottery(){

        $id_lang = $_SESSION['language'];

        $lottery = [];

        // todo переделать выборорку

        if($lotteries=  Lottery::find()->where(['status' => '1', 'result'=>null])->all()){

            $lottery['data'] =  Lottery::find()->where(['status' => '1', 'result'=>null ])->one();
            $lottery['name_prize'] = Translation::find()->where(['alias'=>'name_prize','target_id'=>$lottery['data']->id,'language_id'=>$id_lang])->one();
            $lottery['description'] = Translation::find()->where(['alias'=>'description','target_id'=>$lottery['data']->id,'language_id'=>$id_lang])->one();

            //для вюхи
            $lottery['text'] = Translation::find()->where(['alias'=>'lottery_view_text','language_id'=>$id_lang])->one();
            return $lottery;
        }

        return null;
    }

}
