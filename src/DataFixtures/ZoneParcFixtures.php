<?php

namespace App\DataFixtures;

use App\Entity\ZoneParc;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ZoneParcFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $file = file_get_contents(__DIR__.'/data/ZoneParc.json');
        $zoneArray = json_decode($file, true);
        foreach ($zoneArray as $zone) {
            $zoneParc = new ZoneParc();
            $zoneParc->setLibZone($zone['libZone']);
            $manager->persist($zoneParc);
        }
        $manager->flush();
    }
}
