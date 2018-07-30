<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class HomeCest
{
    public function checkOpen(FunctionalTester $I)
    {
       // $I->amOnPage(\Yii::$app->homeUrl);
        $I->see('JOLLY.BET');
        $I->seeLink('site/agreement');
        $I->click('site/agreement');
        $I->see('Terms of agreement');
    }
}