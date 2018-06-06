<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "translation".
 *
 * @property int $id
 * @property int $language_id
 * @property int $target_id
 * @property string $alias
 * @property string $text
 */
class Translation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'alias', 'text'], 'required'],
            [['language_id', 'target_id'], 'integer'],
            [['text'], 'string'],
            [['alias'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'language_id' => 'Language ID',
            'target_id' => 'Target ID',
            'alias' => 'Alias',
            'text' => 'Text',
        ];
    }
}
