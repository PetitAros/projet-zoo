<?php


namespace App\Tests\Controller\Index;

use App\Tests\Support\ControllerTester;

class indexCest
{
    public function _before(ControllerTester $I)
    {
    }

    // tests
    public function correctName(ControllerTester $I)
    {
        $I->amOnPage('/');
        $I->seeInTitle('index - Zoo Parc de Laval');
    }

    public function correctHttpResponse(ControllerTester $I)
    {
        $I->amOnPage('/');
        $I->seeResponseCodeIs(200);
    }
}
