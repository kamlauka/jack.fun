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
}
