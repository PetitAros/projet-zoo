<?php

namespace App\DataFixtures;

use App\Entity\Espece;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EspèceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $file = file_get_contents(__DIR__.'/data/Espèce.json');
        $espArray = json_decode($file, true);
        foreach ($espArray as $espèce) {
            $esp=new Espece();
            $esp->setLibEspece($espèce['libEspece']);
            $manager->persist($esp);
        }
        $manager->flush();
    }
}
