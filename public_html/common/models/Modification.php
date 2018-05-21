<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "modification".
 *
 * @property int $id
 * @property string $name
 * @property double $data
 * @property string $description
 */
class Modification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'data', 'description'], 'required'],
            [['data'], 'number'],
            [['description'], 'string'],
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
            'data' => 'Data',
            'description' => 'Description',
        ];
    }
}
