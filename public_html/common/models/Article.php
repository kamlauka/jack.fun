<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $name
 * @property string $date_crup
 * @property string $text
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date_crup', 'text'], 'required'],
            [['date_crup'], 'safe'],
            [['text'], 'string'],
            [['name'], 'string', 'max' => 32],
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
            'date_crup' => 'Date Crup',
            'text' => 'Text',
        ];
    }
}
