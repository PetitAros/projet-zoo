<?php


namespace App\Tests\Controller\Famille_animal;

use App\Tests\Support\ControllerTester;

class indexCest
{
    public function _before(ControllerTester $I)
    {
    }

    // tests
    public function correctName(ControllerTester $I)
    {
        $I->amOnPage('/famille_animal');
        $I->seeInTitle('Familles - Zoo Parc de Laval');
    }

    public function correctHttpResponse(ControllerTester $I)
    {
        $I->amOnPage('/famille_animal');
        $I->seeResponseCodeIs(200);
    }
}
