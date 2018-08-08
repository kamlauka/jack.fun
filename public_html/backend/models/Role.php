<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\User;
/**
 * This is the model class for table "log".
 *
 * @property int $id
 * @property int $type
 * @property int $user_id
 * @property int $target_id
 * @property double $amount
 * @property int $result
 *
 * @property User $user
 */
class Role extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_assignment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'item_name' => 'Item name',
          ];
    }

    /**
     * @return array
     */
    public static function getItemList(){
        return[
            'admin'=>'admin',
            'moderator'=>'moderator',
            'user'=>'user',
        ];

    }
    public static function getUserRole($id){
        $dd = Role::find()->where(['user_id'=>$id])->one()?Role::find()->where(['user_id'=>$id])->one():null;
        return $dd;
    }

}
