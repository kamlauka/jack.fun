<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tote".
 *
 * @property int $id
 * @property int $dispute_id
 * @property int $user_id
 * @property int $winner_id
 * @property int $amount
 *
 * @property User $user
 * @property User $winner
 * @property Dispute $dispute
 */
class Tote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tote';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dispute_id', 'user_id', 'winner_id', 'amount'], 'required'],
            [['dispute_id', 'user_id', 'winner_id', 'amount'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['winner_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['winner_id' => 'id']],
            [['dispute_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dispute::className(), 'targetAttribute' => ['dispute_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dispute_id' => 'Dispute ID',
            'user_id' => 'User ID',
            'winner_id' => 'Winner ID',
            'amount' => 'Amount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWinner()
    {
        return $this->hasOne(User::className(), ['id' => 'winner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDispute()
    {
        return $this->hasOne(Dispute::className(), ['id' => 'dispute_id']);
    }
}
