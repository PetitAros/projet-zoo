<?php

namespace App\DataFixtures;

use App\Entity\Reservation;
use App\Factory\BilletFactory;
use App\Factory\ReservationFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ReservationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $reservation = ReservationFactory::createMany(30, function () {
            return [
                'billet' => BilletFactory::random(),
                'user' => UserFactory::random(),
            ];
        });
        foreach ($reservation as $res) {
            if ($res instanceof Reservation) {
                $manager->persist($res);
            }
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            BilletFixtures::class,
            UserFixtures::class,
        ];
    }
}
