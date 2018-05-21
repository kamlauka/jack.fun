<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banlist".
 *
 * @property int $id
 * @property int $user_id
 * @property int $moderator_id
 * @property string $info
 *
 * @property User $user
 * @property User $moderator
 */
class Banlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banlist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'moderator_id', 'info'], 'required'],
            [['user_id', 'moderator_id'], 'integer'],
            [['info'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['moderator_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['moderator_id' => 'id']],
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
            'moderator_id' => 'Moderator ID',
            'info' => 'Info',
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
    public function getModerator()
    {
        return $this->hasOne(User::className(), ['id' => 'moderator_id']);
    }
}
