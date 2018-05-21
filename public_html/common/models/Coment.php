<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "coment".
 *
 * @property int $id
 * @property int $user_id
 * @property int $dispute_id
 * @property int $text
 * @property string $date
 * @property int $status
 *
 * @property User $user
 * @property Dispute $dispute
 */
class Coment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'dispute_id', 'text', 'date'], 'required'],
            [['user_id', 'dispute_id', 'text'], 'integer'],
            [['date'], 'safe'],
            [['status'], 'string', 'max' => 2],
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
            'text' => 'Text',
            'date' => 'Date',
            'status' => 'Status',
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
