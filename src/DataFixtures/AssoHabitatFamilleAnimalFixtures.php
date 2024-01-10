<?php

namespace App\DataFixtures;

use App\Entity\AssoHabitatFamilleAnimal;
use App\Factory\AssoHabitatFamilleAnimalFactory;
use App\Factory\FamilleAnimalFactory;
use App\Factory\HabitatFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
;

class AssoHabitatFamilleAnimalFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $assos = AssoHabitatFamilleAnimalFactory::createMany(20, function () {
            return [
                'habitat' => HabitatFactory::random(),
                'FamilleAnimal' => FamilleAnimalFactory::random(), ];
        });
        foreach ($assos as $asso) {
            if ($asso instanceof AssoHabitatFamilleAnimal) {
                $manager->persist($asso);
            }
        }
        $manager->flush();

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            HabitatFixtures::class,
            FamilleAnimalFixtures::class,
        ];
    }
}
