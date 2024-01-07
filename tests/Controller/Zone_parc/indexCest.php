<?php


namespace App\Tests\Controller\Zone_parc;

use App\Entity\ZoneParc;
use App\Factory\ZoneParcFactory;
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

    public function listWorking(ControllerTester $I)
    {
        ZoneParcFactory::new()->create(['libZone' => 'Ici !', 'imgZone' => NULL]);
        $I->flushToDatabase();
        $I->amOnPage('/zone_parc');
        $I->seeResponseCodeIs(200);
        $I->seeNumberOfElements('div.zone', 1);
    }
}
