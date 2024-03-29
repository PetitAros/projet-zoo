<?php

namespace App\Tests\Controller\Zone_parc;

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

    /**
     * Test qui vérifie le fonctionnement de la liste de zones.
     *
     * @return void
     */
    public function listWorking(ControllerTester $I)
    {
        ZoneParcFactory::new()->create(['libZone' => 'Ici !', 'imgZone' => null]);
        $I->flushToDatabase();
        $I->amOnPage('/zone_parc');
        $I->seeResponseCodeIs(200);
        $I->seeNumberOfElements('div.zone', 1);
    }

    /**
     * Test qui vérifie le fonctionnement de la liste de zones, vérifie le contenu de la page et non celui de la liste.
     *
     * @return void
     */
    public function contentIsCorrect(ControllerTester $I)
    {
        $I->amOnPage('/zone_parc');
        $I->seeResponseCodeIs(200);
        $I->seeInTitle('Zones Parc - Zoo Parc de Laval');
        $I->see('Les zones du parc', 'h1');
    }
}
