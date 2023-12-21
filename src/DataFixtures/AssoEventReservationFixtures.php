<?php

namespace App\DataFixtures;

use App\Entity\AssoEventDateEvent;
use App\Entity\AssoEventReservation;
use App\Entity\Reservation;
use App\Factory\AssoEventDateEventFactory;
use App\Factory\AssoEventReservationFactory;
use App\Factory\DateEventFactory;
use App\Factory\EventFactory;
use App\Factory\ReservationFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AssoEventReservationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $assos = AssoEventReservationFactory::createMany(20, function () {
            return [
                'event' => EventFactory::random(),
                'reservation' => ReservationFactory::random(), ];
        });
        foreach ($assos as $asso) {
            if ($asso instanceof AssoEventReservation) {
                $manager->persist($asso);
            }
        }
        $manager->flush();

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            EventFixtures::class,
            ReservationFixtures::class,
        ];
    }
}
