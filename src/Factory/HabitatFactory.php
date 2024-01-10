<?php

namespace App\Factory;

use App\Entity\Habitat;
use App\Repository\HabitatRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Habitat>
 *
 * @method        Habitat|Proxy                     create(array|callable $attributes = [])
 * @method static Habitat|Proxy                     createOne(array $attributes = [])
 * @method static Habitat|Proxy                     find(object|array|mixed $criteria)
 * @method static Habitat|Proxy                     findOrCreate(array $attributes)
 * @method static Habitat|Proxy                     first(string $sortedField = 'id')
 * @method static Habitat|Proxy                     last(string $sortedField = 'id')
 * @method static Habitat|Proxy                     random(array $attributes = [])
 * @method static Habitat|Proxy                     randomOrCreate(array $attributes = [])
 * @method static HabitatRepository|RepositoryProxy repository()
 * @method static Habitat[]|Proxy[]                 all()
 * @method static Habitat[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Habitat[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Habitat[]|Proxy[]                 findBy(array $attributes)
 * @method static Habitat[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Habitat[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class HabitatFactory extends ModelFactory
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
        $liste = ['Jungle', 'Forêt', 'Savane', 'Ocean', 'Lac', 'Banquise', 'Desert', 'Marécage', 'Montagne', 'Plaine', 'Rivière'];

        return [
            'libHabitat' => self::faker()->randomElement($liste),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Habitat $habitat): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Habitat::class;
    }
}
