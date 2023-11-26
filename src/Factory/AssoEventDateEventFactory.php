<?php

namespace App\Factory;

use App\Entity\AssoEventDateEvent;
use App\Repository\AssoEventDateEventRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<AssoEventDateEvent>
 *
 * @method        AssoEventDateEvent|Proxy                     create(array|callable $attributes = [])
 * @method static AssoEventDateEvent|Proxy                     createOne(array $attributes = [])
 * @method static AssoEventDateEvent|Proxy                     find(object|array|mixed $criteria)
 * @method static AssoEventDateEvent|Proxy                     findOrCreate(array $attributes)
 * @method static AssoEventDateEvent|Proxy                     first(string $sortedField = 'id')
 * @method static AssoEventDateEvent|Proxy                     last(string $sortedField = 'id')
 * @method static AssoEventDateEvent|Proxy                     random(array $attributes = [])
 * @method static AssoEventDateEvent|Proxy                     randomOrCreate(array $attributes = [])
 * @method static AssoEventDateEventRepository|RepositoryProxy repository()
 * @method static AssoEventDateEvent[]|Proxy[]                 all()
 * @method static AssoEventDateEvent[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static AssoEventDateEvent[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static AssoEventDateEvent[]|Proxy[]                 findBy(array $attributes)
 * @method static AssoEventDateEvent[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static AssoEventDateEvent[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class AssoEventDateEventFactory extends ModelFactory
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
            'horaire' => self::faker()->unixTime(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(AssoEventDateEvent $assoEventDateEvent): void {})
        ;
    }

    protected static function getClass(): string
    {
        return AssoEventDateEvent::class;
    }
}
