<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jackpot".
 *
 * @property int $id
 * @property double $total
 * @property int $status
 * @property string $date_start
 * @property string $result
 */
class Jackpot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jackpot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['total', 'status', 'date_start'], 'required'],
            [['total'], 'double'],
            [['date_start'], 'safe'],
            [['status'], 'number', 'max' => 4],
            [['result'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'total' => 'Total',
            'status' => 'Status',
            'date_start' => 'Date Start',
            'result' => 'Result',
        ];
    }

    public static function getInfoActiveJackpot(){

        $id_lang = Language::getCurrent()->id;

        $jackpot = [];

        if(Jackpot::getActiveJackpotObject() != null){

            $jackpot['data'] = Jackpot::getActiveJackpotObject();
            $jackpot['description'] = Translation::find()->where(['alias' => 'jackpot_description','language_id' => $id_lang])->one();
            //для вюхи
            $jackpot['text_1'] = Translation::find()->where(['alias' => 'jackpot_view_text_1','language_id' => $id_lang])->one();
            $jackpot['text_2'] = Translation::find()->where(['alias' => 'jackpot_view_text_2','language_id' => $id_lang])->one();
            $jackpot['text_3'] = Translation::find()->where(['alias' => 'jackpot_view_text_3','language_id' => $id_lang])->one();
            $jackpot['text_4'] = Translation::find()->where(['alias' => 'jackpot_view_text_4','language_id' => $id_lang])->one();

            return $jackpot;
        }
        return null;
    }

    /**
     * @return object|\yii\db\ActiveRecord[]
     */
    public static function getActiveJackpotObject(){

        return Jackpot::find()->where(['status' => 1,'result'=>null ])->one();
    }

    public static function addPercentFromLottery(){

        $pc_jackpot = Lottery::getActiveLotteryObject()->rate / 100 * Modification::getPercentJackpot()->data;

        $jackpot = Jackpot::getActiveJackpotObject();
        $jackpot->total += $pc_jackpot;

        if($jackpot->save()){
            //todo реализовать логи
            return true;
        }else{
            return false;
        }
    }


}
