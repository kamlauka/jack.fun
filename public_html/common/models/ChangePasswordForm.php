<?php
namespace common\models;


use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Change Password form
 */
class ChangePasswordForm extends Model
{
    public $password;
    public $password_repeat;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'password_repeat'], 'required'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],
        ];
    }


    public function change()
    {
        if (!$this->validate()) {
            return null;
        }

        /** @var User $user */
        $user = \Yii::$app->user->identity;
        $user->setPassword($this->password);
        if($user->save()) {
            if($user->email){
//                Yii::$app->mailer->compose(null,[
//                    'content' => 'Ваш пароль был изменен! Если Вы этого неделали, обязательно сообщение нам.',
//                    'page' => 'Пароль изменен'
//                ])
//                    ->setTo($user->email)
//                    ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->params['siteName']])
//                    ->setSubject('Пароль изменен!')
//                    ->send();
                return true;
            }
        }
        return false;
    }
}
