<?php

namespace App\DataFixtures;

use App\Entity\AssoEventDateEvent;
use App\Factory\AssoEventDateEventFactory;
use App\Factory\DateEventFactory;
use App\Factory\EventFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AssoEventDateEventFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $assos=AssoEventDateEventFactory::createMany(20,function (){
            return [
               'event' => EventFactory::random(),
                'dateEvent'=>DateEventFactory::random(),];
        });
        foreach ($assos as $asso){
            if($asso instanceof AssoEventDateEvent){
                $manager->persist($asso);
            }
        }
        $manager->flush();
    }
    public function getDependencies():array{
        return [
            EventFixtures::class,
            DateEventFixtures::class
        ];
    }
}
