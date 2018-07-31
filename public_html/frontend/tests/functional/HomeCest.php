<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class HomeCest
{
    public function checkAbout(FunctionalTester $I)
    {
        $I->amOnRoute('site/about');
        $I->see('About', 'h1');
    }

    public function checkOpen(FunctionalTester $I)
    {

        $I->amOnPage('site/index');
        $I->see('JOLLY.BET');
        $I->seeLink('site/agreement');
        $I->click('site/agreement');
        $I->see('Terms of agreement');

    }
}