<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;
use common\fixtures\UserFixture;
use frontend\controllers\SiteController;

class LoginCest
{



//    public function _fixtures()
//    {
//        return [
//            'user' => [
//                'class' => UserFixture::className(),
//                'dataFile' => codecept_data_dir() . 'login_data.php'
//            ]
//        ];
//    }
//
//    public function _before(FunctionalTester $I)
//    {
//        $I->amOnRoute('site/login');
//    }

    protected function formParams($login, $password)
    {
        return [
            'LoginForm[username]' => $login,
            'LoginForm[password]' => $password,
        ];
    }



    public function checkOpen(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->see('JOLLY.BET');
        $I->seeLink('/frontend/site/agreement');
        $I->click('/frontend/site/agreement');
        $I->see('Terms of agreement');
    }

//
//    protected function formParams($login, $password)
//    {
//        return [
//            'LoginForm[username]' => $login,
//            'LoginForm[password]' => $password,
//        ];
//    }
//
//    public function checkEmpty(FunctionalTester $I)
//    {
//        $I->wantToTest('login page of my site');
//        //$I->amOnPage('frontend'.\Yii::$app->homeUrl);
//        $I->see('Login', 'h3');
//        $I->submitForm('#login-form', $this->formParams('', ''));
//        $I->seeValidationError('Username cannot be blank.');
//        $I->seeValidationError('Password cannot be blank.');
//    }
//
//    public function checkWrongPassword(FunctionalTester $I)
//    {
//        $I->submitForm('#login-form', $this->formParams('admin', 'wrong'));
//        $I->seeValidationError('Incorrect username or password.');
//    }
//
//    public function checkValidLogin(FunctionalTester $I)
//    {
//        $I->submitForm('#login-form', $this->formParams('erau', 'password_0'));
//        $I->see('Logout (erau)', 'form button[type=submit]');
//        $I->dontSeeLink('Login');
//        $I->dontSeeLink('Signup');
//    }
}
