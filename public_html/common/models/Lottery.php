<?php

namespace common\models;

use frontend\controllers\TransactionController;
use Yii;

/**
 * This is the model class for table "lottery".
 *
 * @property int $id
 * @property string $name
 * @property int $total
 * @property string $status
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
            [['description'], 'string'],
            [['rate','total','currency_start'], 'double'],
            [['name', 'name_prize'], 'string', 'max' => 32],
            [['result','status'], 'string', 'max' => 16],
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
        if(Lottery::getActiveLotteryObject() != null){

            $lottery['data'] =  Lottery::getActiveLotteryObject();
            $lottery['name_prize'] = Translation::find()->where(['alias'=>'name_prize','target_id'=>$lottery['data']->id,'language_id'=>$id_lang])->one();
            $lottery['description'] = Translation::find()->where(['alias'=>'description','target_id'=>$lottery['data']->id,'language_id'=>$id_lang])->one();
            $lottery['text'] = Translation::find()->where(['alias'=>'lottery_view_text','language_id'=>$id_lang])->one();
            $lottery['user_transaction_hash'] =  Transaction::find()->select('hash')->where(['user_id'=>Yii::$app->user->id,'target_id'=>$lottery['data']->id] )->one();
            $lottery['winner'] = Lottery::find()->where(['status'=>'Wait_participant'])->one();
            return $lottery;
        }
        return null;
    }

    /**
     * @return object|\yii\db\ActiveRecord[]
     */
    public static function getActiveLotteryObject(){

        return Lottery::find()->where(['status' => 'Active', 'result'=>null])->one();
    }

    /**
     * @return array
     */
    public static function getStatusList(){
        return[
            'Issued' => 'Выдан учаснику',
            'Waiting' => 'Ожидание',
            'Active' => 'В розыгрыше',
            'Wait_participant' => 'Ожидание учасника',
            'Next' => 'Следующий',
            'Questionable' => 'Под вопросом'
        ];
    }
}
