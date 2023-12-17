<?php

namespace App\DataFixtures;

use App\Entity\Billet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BilletFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $file = file_get_contents(__DIR__.'/data/Billet.json');
        $billetArray = json_decode($file, true);
        foreach ($billetArray as $billet) {
            $billetParc = new Billet();
            $billetParc->setNbJours($billet['nbJours']);
            $billetParc->setTarifAdult($billet['tarifAdult']);
            $billetParc->setTarifChild($billet['tarifChild']);
            $manager->persist($billetParc);
        }

        $manager->flush();
    }
}
