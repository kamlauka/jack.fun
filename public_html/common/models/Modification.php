<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "modification".
 *
 * @property int $id
 * @property string $name
 * @property double $data
 * @property string $description
 */
class Modification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'data', 'description'], 'required'],
            [['description','data'], 'string'],
            [['name'], 'string', 'max' => 255],
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
            'data' => 'Data',
            'description' => 'Description',
        ];
    }

    public static function getAdminWallet(){
       return Modification::findOne(6);
    }

    public static function getPercentJackpot(){
        return Modification::find()->select('data')->where(['id'=>2,'name'=>'percent_jackpot'])->one();
    }

    public static function getPercentAdmin(){
        return Modification::find()->select('data')->where(['id'=>4,'name'=>'percent_admin'])->one();
    }

    public static function getPercentExchange(){
        return  Modification::find()->select('data')->where(['id'=>3,'name'=>'percent_exchange'])->one();
    }
}
