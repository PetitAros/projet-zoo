<?php

namespace App\DataFixtures;

use App\Factory\ReservationFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ReservationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        ReservationFactory::createMany(10);
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            BilletFixtures::class,
        ];
    }
}
