<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "online".
 *
 * @property int $id
 * @property int $user_id
 * @property int $dispute_id
 *
 * @property User $user
 * @property Dispute $dispute
 */
class Online extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'online';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'dispute_id'], 'required'],
            [['user_id', 'dispute_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
            'dispute_id' => 'Dispute ID',
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
    public function getDispute()
    {
        return $this->hasOne(Dispute::className(), ['id' => 'dispute_id']);
    }
}
