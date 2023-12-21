<?php

namespace App\Factory;

use App\Entity\AssoEventReservation;
use App\Repository\AssoEventReservationRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<AssoEventReservation>
 *
 * @method        AssoEventReservation|Proxy                     create(array|callable $attributes = [])
 * @method static AssoEventReservation|Proxy                     createOne(array $attributes = [])
 * @method static AssoEventReservation|Proxy                     find(object|array|mixed $criteria)
 * @method static AssoEventReservation|Proxy                     findOrCreate(array $attributes)
 * @method static AssoEventReservation|Proxy                     first(string $sortedField = 'id')
 * @method static AssoEventReservation|Proxy                     last(string $sortedField = 'id')
 * @method static AssoEventReservation|Proxy                     random(array $attributes = [])
 * @method static AssoEventReservation|Proxy                     randomOrCreate(array $attributes = [])
 * @method static AssoEventReservationRepository|RepositoryProxy repository()
 * @method static AssoEventReservation[]|Proxy[]                 all()
 * @method static AssoEventReservation[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static AssoEventReservation[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static AssoEventReservation[]|Proxy[]                 findBy(array $attributes)
 * @method static AssoEventReservation[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static AssoEventReservation[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class AssoEventReservationFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'event' => EventFactory::new(),
            'reservation' => ReservationFactory::new(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(AssoEventReservation $assoEventReservation): void {})
        ;
    }

    protected static function getClass(): string
    {
        return AssoEventReservation::class;
    }
}
