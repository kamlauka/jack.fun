<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lottery".
 *
 * @property int $id
 * @property string $name
 * @property int $total
 * @property int $status
 * @property string $date_start
 * @property string $result
 * @property string $description
 * @property double $rate
 * @property string $name_prize
 * @property string $img
 */
class Lottery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lottery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date_start', 'rate', 'name_prize', 'img'], 'required'],
           // [['img'],'image','extensions' => 'png, jpg, jpeg, gif','skipOnEmpty' => true, 'on' => 'update-photo-upload'],
            [['total'], 'integer'],
            [['date_start'], 'safe'],
            [['description'], 'string'],
            [['rate'], 'number'],
            [['name', 'name_prize'], 'string', 'max' => 32],
            [['status'], 'string', 'max' => 2],
            [['result'], 'string', 'max' => 10],
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
            'total' => 'Total',
            'status' => 'Status',
            'date_start' => 'Date Start',
            'result' => 'Result',
            'description' => 'Description',
            'rate' => 'Rate',
            'name_prize' => 'Name Prize',
            'img' => 'Img',
        ];
    }


//    function scenario()
//    {
//        return [
//            'create' => ['img ', 'carid','name','coverphoto','status'],
//            'update' => ['img ', 'carid','name','coverphoto','status'],
//        ];
//    }

}
