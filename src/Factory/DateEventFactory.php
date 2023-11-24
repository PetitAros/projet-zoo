<?php

namespace App\Factory;

use App\Entity\DateEvent;
use App\Repository\DateEventRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<DateEvent>
 *
 * @method        DateEvent|Proxy create(array|callable $attributes = [])
 * @method static DateEvent|Proxy createOne(array $attributes = [])
 * @method static DateEvent|Proxy find(object|array|mixed $criteria)
 * @method static DateEvent|Proxy findOrCreate(array $attributes)
 * @method static DateEvent|Proxy first(string $sortedField = 'id')
 * @method static DateEvent|Proxy last(string $sortedField = 'id')
 * @method static DateEvent|Proxy random(array $attributes = [])
 * @method static DateEvent|Proxy randomOrCreate(array $attributes = [])
 * @method static DateEventRepository|RepositoryProxy repository()
 * @method static DateEvent[]|Proxy[] all()
 * @method static DateEvent[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static DateEvent[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static DateEvent[]|Proxy[] findBy(array $attributes)
 * @method static DateEvent[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static DateEvent[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class DateEventFactory extends ModelFactory
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
            'dateEvent' => self::faker()->dateTimeInInterval('- 0 days','+ 4 weeks'),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(DateEvent $dateEvent): void {})
        ;
    }

    protected static function getClass(): string
    {
        return DateEvent::class;
    }
}
