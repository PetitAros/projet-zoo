<?php


namespace App\Tests\Controller\Event;

use App\Factory\EventFactory;
use App\Tests\Support\ControllerTester;

class indexCest
{
    public function _before(ControllerTester $I)
    {
    }

    // tests
    public function correctName(ControllerTester $I)
    {
        $I->amOnPage('/event');
        $I->seeInTitle('Liste des événements - Zoo Parc de Laval');
    }

    public function correctHttpResponse(ControllerTester $I)
    {
        $I->amOnPage('/event');
        $I->seeResponseCodeIs(200);
    }

    public function listWorking(ControllerTester $I)
    {
        EventFactory::new()->createMany(5);
        $I->flushToDatabase();
        $I->amOnPage('/event');
        $I->seeResponseCodeIs(200);
        $I->seeNumberOfElements('a[class=event]', 5);
    }

}
