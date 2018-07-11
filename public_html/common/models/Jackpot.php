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
            [['total'], 'number'],
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

    public static function getActiveJackpot(){

        $id_lang = $_SESSION['language'];

        $jackpot = [];

        if($jackpots = Jackpot::find()->where(['status' => 1,'result'=>null ])->all()){

            $jackpot['data'] = Jackpot::find()->where(['status' => 1,'result'=>null ])->one();
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



}
