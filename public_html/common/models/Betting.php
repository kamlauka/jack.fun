<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "betting".
 *
 * @property int $id
 * @property int $user_id
 * @property int $target_id
 * @property double $rate
 * @property double $pc_target
 * @property double $date_creation
 * @property double $pc_jackpot
 * @property double $pc_transaction
 * @property double $pc_keep
 * @property double $pc_organizer
 *
 * @property User $user
 */
class Betting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'betting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'target_id', 'rate', 'pc_target', 'pc_jackpot', 'pc_transaction', 'pc_keep', 'pc_organizer', 'date_creation'], 'required'],
            [['date_creation'], 'safe'],
            [['status'], 'safe'],
            [['user_id', 'target_id'], 'integer'],
            [['rate', 'pc_target', 'pc_jackpot', 'pc_transaction', 'pc_keep', 'pc_organizer'], 'number'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'target_id' => 'Target ID',
            'rate' => 'Rate',
            'pc_target' => 'Pc Target',
            'pc_jackpot' => 'Pc Jackpot',
            'pc_transaction' => 'Pc Transaction',
            'pc_keep' => 'Pc Keep',
            'pc_organizer' => 'Pc Organizer',
            'date_creation' => 'Date creation',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function createNewBetLottery(){



        $lottery = Lottery::getActiveLotteryObject();

        $pc_jackpot = $lottery->rate / 100 * Modification::getPercentJackpot()->data;
        $pc_keep = $lottery->rate / 100 * Modification::getPercentAdmin()->data;
        $pc_transaction = $lottery->rate / 100 * Modification::getPercentExchange()->data;

        $betting = new Betting();
        $betting->user_id = Yii::$app->user->identity->id;
        $betting->target_id = $lottery->id;
        $betting->rate = $lottery->rate - $pc_jackpot - $pc_keep - $pc_transaction ;
        $betting->date_creation = date("Y-m-d h:i:s");
        $betting->pc_jackpot = $pc_jackpot;
        $betting->pc_keep = $pc_keep;
        $betting->pc_organizer = 0;
        $betting->pc_target = 0;
        $betting->pc_transaction = $pc_transaction;
        return $betting->save();

    }
}
