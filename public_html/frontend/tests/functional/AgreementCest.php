<?php
namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class AgreementCest
{
    public function checkAgreement(FunctionalTester $I)
    {
        $I->amOnRoute('frontend/ite/agreement');
        $I->see('Terms of agreement', 'h2');
       // $I->see('lorem ipsum', 'h2');
    }
}
