<?php


namespace App\Tests\Controller\Famille_animal;

use App\Factory\FamilleAnimalFactory;
use App\Tests\Support\ControllerTester;

class showCest
{
    public function _before(ControllerTester $I)
    {
    }

    // tests
    public function tryToTest(ControllerTester $I)
    {
    }

    public function showFamilleAnimal(ControllerTester $I)
    {
        FamilleAnimalFactory::createOne(['nomFamilleAnimal' => 'Famille cool']);
        $I->amOnPage('/famille_animal/1');
        $I->seeResponseCodeIs(200);
        $I->see('Nom de la famille', 'p');
        $I->see('Nom scientifique', 'p');
        $I->see('Degrée de danger d\'extinction', 'p');
        $I->see('Type d\'alimentation', 'p');
        $I->see('Famille cool', 'h1');
    }
}
