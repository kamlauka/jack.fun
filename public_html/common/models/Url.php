<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "url".
 *
 * @property int $id
 * @property int $target_id
 * @property string $type
 * @property string $value
 */
class Url extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'url';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['target_id', 'type', 'value'], 'required'],
            [['target_id'], 'integer'],
            [['type'], 'string', 'max' => 32],
            [['value'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'target_id' => 'Target ID',
            'type' => 'Type',
            'value' => 'Value',
        ];
    }
}
