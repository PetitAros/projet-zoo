<?php

namespace App\DataFixtures;

use App\Factory\HabitatFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class HabitatFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        HabitatFactory::createMany(5);
    }
}
