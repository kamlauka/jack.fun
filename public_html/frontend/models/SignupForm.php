<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $wallet;
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

            ['wallet', 'trim'],
            ['wallet', 'required'],
            ['wallet', 'string', 'max' => 255],
            ['wallet', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This wallet address has already been taken.'],

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
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if ($this->validate()) {

//            if($this->agreement == false){
//                return null;
//            }

            $user = new User();
            $user->username = $this->username;
            $user->wallet = $this->wallet;
            $user->setPassword($this->password);
            $user->generateAuthKey();

            return $user->save() ? $user : null;

        }

    }
}
