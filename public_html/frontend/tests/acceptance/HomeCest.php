<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->see('jolli.bet');

        $I->seeLink('Jackpot');
        $I->click('Jackpot');
//        $I->wait(2); // wait for page to be opened
//        $I->see('This is the About page.');
    }
}
