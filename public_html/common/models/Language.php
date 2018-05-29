<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property int $id
 * @property int $language_id
 * @property string $alias
 * @property string $text
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'alias', 'text'], 'required'],
            //[['language_id'], 'integer'],
            [['text'], 'string'],
            [['target_id','language_id'], 'string'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'language_id' => 'Language',
            'alias' => 'Alias',
            'text' => 'Text',
            'target_id' => 'target id',
        ];
    }
}
