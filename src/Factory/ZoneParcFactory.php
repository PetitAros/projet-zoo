<?php

namespace App\Factory;

use App\Entity\ZoneParc;
use App\Repository\ZoneParcRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<ZoneParc>
 *
 * @method        ZoneParc|Proxy                     create(array|callable $attributes = [])
 * @method static ZoneParc|Proxy                     createOne(array $attributes = [])
 * @method static ZoneParc|Proxy                     find(object|array|mixed $criteria)
 * @method static ZoneParc|Proxy                     findOrCreate(array $attributes)
 * @method static ZoneParc|Proxy                     first(string $sortedField = 'id')
 * @method static ZoneParc|Proxy                     last(string $sortedField = 'id')
 * @method static ZoneParc|Proxy                     random(array $attributes = [])
 * @method static ZoneParc|Proxy                     randomOrCreate(array $attributes = [])
 * @method static ZoneParcRepository|RepositoryProxy repository()
 * @method static ZoneParc[]|Proxy[]                 all()
 * @method static ZoneParc[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static ZoneParc[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static ZoneParc[]|Proxy[]                 findBy(array $attributes)
 * @method static ZoneParc[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static ZoneParc[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class ZoneParcFactory extends ModelFactory
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
            'libZone' => self::faker()->text(128),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(ZoneParc $zoneParc): void {})
        ;
    }

    protected static function getClass(): string
    {
        return ZoneParc::class;
    }
}
