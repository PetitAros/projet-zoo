<?php


namespace App\Tests\Controller\Zone_parc;

use App\Tests\Support\ControllerTester;

class indexCest
{
    public function _before(ControllerTester $I)
    {
    }

    // tests
    public function correctName(ControllerTester $I)
    {
        $I->amOnPage('/zone_parc');
        $I->seeInTitle('Zones Parc - Zoo Parc de Laval');
    }

    public function correctHttpResponse(ControllerTester $I)
    {
        $I->amOnPage('/zone_parc');
        $I->seeResponseCodeIs(200);
    }
}
