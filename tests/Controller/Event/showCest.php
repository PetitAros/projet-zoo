<?php

namespace App\Tests\Controller\Event;

use App\Factory\EventFactory;
use App\Tests\Support\ControllerTester;

class showCest
{
    public function _before(ControllerTester $I)
    {
    }

    // tests

    /**
     * Test qui vérifie l'affichage d'un évènement.
     *
     * @return void
     */
    public function showEvent(ControllerTester $I)
    {
        EventFactory::createOne(['nomEvent' => 'Event très cool']);
        $I->amOnPage('/event/1');
        $I->seeResponseCodeIs(200);
        $I->see('Informations complémentaires:', 'h2');
        $I->see('Les dates prochaines:', 'h2');
        $I->see('Event très cool', 'h1');
    }
}
