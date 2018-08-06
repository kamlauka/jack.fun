<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use Yii;

/**
 * Signup form
 * @property string $username
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $agreement = false;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['password_repeat', 'required'],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],

            ['agreement','required'],
            ['agreement','boolean'],
            ['agreement', 'compare', 'compareValue' => 1, 'message' => 'You need to accept the terms of the agreement!']

        ];
    }


    /**
     * @return User|null
     * @throws \Exception
     */
    public function signup()
    {
        if ($this->validate()) {

            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $TEST =  md5($this->email . time());
            $user->active = $TEST ;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            //todo раскоментить и протестить (роли)
//            $auth = Yii::$app->authManager;
//            $authorRole = $auth->getRole('user');
//            $auth->assign($authorRole, $user->getId());

            return $user->save() ? $user : null;

        }
        return null;
    }
}
