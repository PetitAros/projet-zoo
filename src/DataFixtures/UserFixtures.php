<?php

namespace App\DataFixtures;

use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        UserFactory::createOne([
            'email' => 'louise@example.com',
            'pnomUser' => 'Louise',
            'nomUser' => 'Parent',
            'password' => 'password',
        ]);
        UserFactory::createOne([
            'email' => 'Wil@example.com',
            'pnomUser' => 'Wilfried',
            'nomUser' => 'Noel',
            'password' => 'test',
            'roles' => ['ROLE_ADMIN'],
        ]);

        $manager->flush();
    }
}
