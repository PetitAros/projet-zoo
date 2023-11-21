<?php

namespace App\DataFixtures;

use App\Entity\FamilleAnimal;
use App\Factory\FamilleAnimalFactory;
use App\Factory\ZoneParcFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class FamilleAnimalFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $familles=FamilleAnimalFactory::createMany(20,function (){
            return[
                'zoneParc'=> ZoneParcFactory::random(),
            ];
        });
        foreach ($familles as $famille){
            if($famille instanceof FamilleAnimal){
                $manager->persist($famille);
            }
        }
        $manager->flush();
    }
    public function getDependencies():array{
        return [
            ZoneParcFixtures::class,
        ];
    }
}
