<?php

namespace App\Tests\Controller\Famille_animal;

use App\Factory\FamilleAnimalFactory;
use App\Tests\Support\ControllerTester;

class indexCest
{
    public function _before(ControllerTester $I)
    {
    }

    // tests

    /**
     * @return void
     */
    public function correctName(ControllerTester $I)
    {
        $I->amOnPage('/famille_animal');
        $I->seeInTitle('Familles - Zoo Parc de Laval');
    }

    /**
     * @return void
     */
    public function correctHttpResponse(ControllerTester $I)
    {
        $I->amOnPage('/famille_animal');
        $I->seeResponseCodeIs(200);
    }

    /**
     * Test qui vérifie le fonctionnement de la liste de famille d'animal.
     *
     * @return void
     */
    public function listWorking(ControllerTester $I)
    {
        FamilleAnimalFactory::new()->createMany(5);
        $I->flushToDatabase();
        $I->amOnPage('/famille_animal');
        $I->seeResponseCodeIs(200);
        $I->seeNumberOfElements('a.species', 5);
    }

    public function search(ControllerTester $I): void
    {
        FamilleAnimalFactory::new()->createMany(5);
        FamilleAnimalFactory::new()->createSequence(
            [
                ['nomFamilleAnimal' => 'Licorne'],
            ]
        );
        $I->flushToDatabase();
        $I->amOnPage('/famille_animal?search=corne');
        $I->assertEquals(['Licorne'], $I->grabMultiple('p.nameAnimal'));
    }
}
