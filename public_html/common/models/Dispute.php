<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dispute".
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property double $rate
 * @property int $type
 * @property int $active
 * @property int $executor_id
 * @property int $initiator_id
 * @property int $moderator_id
 * @property string $date_start
 * @property string $date_end
 * @property int $result
 * @property int $status
 * @property string $description
 *
 * @property Coment[] $coments
 * @property User $executor
 * @property User $initiator
 * @property User $moderator
 * @property Online[] $onlines
 * @property Tote[] $totes
 */
class Dispute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dispute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'img', 'rate', 'type', 'moderator_id'], 'required'],
            [['rate', 'total'], 'number'],
            [['executor_id', 'initiator_id', 'moderator_id'], 'integer'],
            [['date_start', 'date_end'], 'safe'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 32],
            [['type', 'active', 'result', 'status'], 'string', 'max' => 2],
            [['executor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['executor_id' => 'id']],
            [['initiator_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['initiator_id' => 'id']],
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
            'name' => 'Name',
            'img' => 'Img',
            'rate' => 'Rate',
            'total' => 'Total',
            'type' => 'Type',
            'active' => 'Active',
            'executor_id' => 'Executor ID',
            'initiator_id' => 'Initiator ID',
            'moderator_id' => 'Moderator ID',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'result' => 'Result',
            'status' => 'Status',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComents()
    {
        return $this->hasMany(Coment::className(), ['dispute_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExecutor()
    {
        return $this->hasOne(User::className(), ['id' => 'executor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInitiator()
    {
        return $this->hasOne(User::className(), ['id' => 'initiator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModerator()
    {
        return $this->hasOne(User::className(), ['id' => 'moderator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOnlines()
    {
        return $this->hasMany(Online::className(), ['dispute_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTotes()
    {
        return $this->hasMany(Tote::className(), ['dispute_id' => 'id']);
    }

    public static function getListTypes() {
        return [
            'От инициатора',
            'От Исполнителя',
            'От Админа',

        ];
    }


}
