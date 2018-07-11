<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $phone
 * @property int $type
 * @property double $balance
 * @property string $avatar
 * @property string $active
 * @property string $file
 *
 * @property Banlist[] $banlists
 * @property Banlist[] $banlists0
 * @property Betting[] $bettings
 * @property Comment[] $comments
 * @property Dispute[] $disputes
 * @property Dispute[] $disputes0
 * @property Dispute[] $disputes1
 * @property Log[] $logs
 * @property Online[] $onlines
 * @property Tote[] $totes
 * @property Tote[] $totes0
 * @property Transaction[] $transactions
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{

   // public $auth_key_repeat;

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_HOLD = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', ], 'required'],
            [['balance'], 'number'],
            [['username', 'auth_key', 'password_hash','password_reset_token', 'password_reset_token'], 'string'],
            [['status'], 'integer'],
            [['phone','active'], 'string'],
            [['email'], 'email'],
            [['type'], 'integer', 'max' => 2],
            [['avatar','file'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Nickname',
            'auth_key' => 'Password',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'phone' => 'Phone',
            'type' => 'Type',
            'balance' => 'Balance',
            'avatar' => 'Avatar',
            'file' => 'File',
            'active' => 'activation',
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBanlists()
    {
        return $this->hasMany(Banlist::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBanlists0()
    {
        return $this->hasMany(Banlist::className(), ['moderator_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBettings()
    {
        return $this->hasMany(Betting::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisputes()
    {
        return $this->hasMany(Dispute::className(), ['executor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisputes0()
    {
        return $this->hasMany(Dispute::className(), ['initiator_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisputes1()
    {
        return $this->hasMany(Dispute::className(), ['moderator_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogs()
    {
        return $this->hasMany(Log::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOnlines()
    {
        return $this->hasMany(Online::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTotes()
    {
        return $this->hasMany(Tote::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTotes0()
    {
        return $this->hasMany(Tote::className(), ['winner_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transaction::className(), ['user_id' => 'id']);
    }


    public static function getListTypes() {
        return [
            'Gamer',
            'Moderator',
            'Administrator',

        ];
    }


    public function upload()
    {
        if ($this->validate()) {

            if($this->avatar){
                $this->avatar->saveAs(__DIR__ . '/../uploads/avatar/'. $this->avatar->baseName . '.' . $this->avatar->extension);
                $this->avatar = __DIR__ . '/../uploads/avatar/'. $this->avatar->baseName . '.' . $this->avatar->extension;
            }

            if($this->file){
                $this->file->saveAs(__DIR__ . '/../uploads/document/' . $this->file->baseName . '.' . $this->file->extension);
                $this->file = __DIR__ . '/../uploads/document/' . '.' . $this->file->extension;
            }
            return true;
        } else {
            return false;
        }
    }

    public static function getListAllActivGamer(){
            return User::find()->where(['type' => 0,'status' => 1 ])->select(['id'])->indexBy('id')->column();

    }

//    public function afterSave()
//    {
//        parent::afterSave();
//        Tag::model()->updateFrequency($this->_oldTags, $this->tags);
//    }

//    private $_oldTags;
//
//    public function afterFind()
//    {
//        parent::afterFind();
//      //  $this->_oldTags = $this->tags;
//    }



}
