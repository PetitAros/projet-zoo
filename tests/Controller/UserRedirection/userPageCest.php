<?php

namespace App\Tests\Controller\UserRedirection;

use App\Factory\UserFactory;
use App\Tests\Support\ControllerTester;

class userPageCest
{
    public function _before(ControllerTester $I)
    {
    }

    // tests
    public function tryToTest(ControllerTester $I)
    {
    }

    /**
     * Test qui vérifie la redirection vers la page de connexion si l'utilisateur n'est pas connecté.
     *
     * @return void
     */
    public function redirectionToLogin(ControllerTester $I)
    {
        $I->amOnPage('/user');
        $I->amOnRoute('app_login');
    }

    /**
     * Test qui vérifie si la page user est accessible si l'utilisateur est connecté. Vérifie également son contenu.
     *
     * @return void
     */
    public function userPageWorkingIfLogged(ControllerTester $I)
    {
        $user = UserFactory::createOne([
            'email' => 'test@test.com',
            'password' => 'test',
            'phoneUser' => '0606060606',
            'roles' => ['ROLE_USER'],
            'nomUser' => 'Moi',
            'pnomUser' => 'Toujours',
        ]);

        $realUser = $user->object();
        $I->amLoggedInAs($realUser);
        $I->amOnPage('/user');
        $I->seeInTitle('Welcome - Zoo Parc de Laval');
    }

    public function usersCantAccessCrud(ControllerTester $I)
    {
        $user = UserFactory::createOne([
            'email' => 'test@test.com',
            'password' => 'test',
            'phoneUser' => '0606060606',
            'roles' => ['ROLE_USER'],
            'nomUser' => 'Moi',
            'pnomUser' => 'Toujours',
        ]);

        $realUser = $user->object();
        $I->amLoggedInAs($realUser);
        $I->amOnPage('/admin');
        $I->seeResponseCodeIs(403);
    }

    public function adminsCanAccessCrud(ControllerTester $I)
    {
        $user = UserFactory::createOne([
            'email' => 'test@test.com',
            'password' => 'test',
            'phoneUser' => '0606060606',
            'roles' => ['ROLE_ADMIN'],
            'nomUser' => 'Moi',
            'pnomUser' => 'Toujours',
        ]);

        $realUser = $user->object();
        $I->amLoggedInAs($realUser);
        $I->amOnPage('/admin');
        $I->seeResponseCodeIs(200);
    }
}
