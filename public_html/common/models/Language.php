<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property int $id
 * @property int $language_id
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
            [['language_id', 'text'], 'required'],
            [['language_id'], 'integer'],
            [['text'], 'string'],
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
            'text' => 'Text',
        ];
    }
}
