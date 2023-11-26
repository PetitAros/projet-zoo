<?php

namespace App\DataFixtures;

use App\Factory\DateEventFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DateEventFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        DateEventFactory::createMany(20);
    }
}
