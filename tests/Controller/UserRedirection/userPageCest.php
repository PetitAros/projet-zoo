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

    public function redirectionToLogin(ControllerTester $I)
    {
        $I->amOnPage('/user');
        $I->amOnRoute('app_login');
    }

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
}
