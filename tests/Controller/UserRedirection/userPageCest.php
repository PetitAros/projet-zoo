<?php


namespace App\Tests\Controller\UserRedirection;

use App\Tests\Support\ControllerTester;

class userPageCest
{
    public function _before(ControllerTester $I)
    {
    }

    // tests
    public function tryToTest(ControllerTester $I)
    {
    }

    public function redirectionToLogin(ControllerTester $I)
    {
        $I->amOnPage('/user');
        $I->amOnRoute('app_login');
    }
}
