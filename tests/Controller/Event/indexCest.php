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

    /**
     * Test qui vérifie le fonctionnement de la liste d'évènement.'.
     *
     * @return void
     */
    public function listWorking(ControllerTester $I)
    {
        EventFactory::new()->createMany(5);
        $I->flushToDatabase();
        $I->amOnPage('/event');
        $I->seeResponseCodeIs(200);
        $I->seeNumberOfElements('a[class=event]', 5);
    }

    /**
     * Test qui vérifie le fonctionnement de la barre de recherche de la liste d'évènement.
     *
     * @param ControllerTester $I
     * @return void
     */
    public function search(ControllerTester $I): void
    {
        EventFactory::new()->createMany(5);
        EventFactory::new()->createSequence(
            [
                ['nomEvent' => 'Evènement cool'],
                ['nomEvent' => 'Evènement nul'],
            ]
        );
        $I->flushToDatabase();
        $I->amOnPage('/event?search=cool');
        $I->assertEquals(['Evènement cool'], $I->grabMultiple('p.eventName'));
    }
}
