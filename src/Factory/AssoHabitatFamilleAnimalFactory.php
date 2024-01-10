<?php

namespace App\Factory;

use App\Entity\AssoHabitatFamilleAnimal;
use App\Repository\AssoHabitatFamilleAnimalRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<AssoHabitatFamilleAnimal>
 *
 * @method        AssoHabitatFamilleAnimal|Proxy create(array|callable $attributes = [])
 * @method static AssoHabitatFamilleAnimal|Proxy createOne(array $attributes = [])
 * @method static AssoHabitatFamilleAnimal|Proxy find(object|array|mixed $criteria)
 * @method static AssoHabitatFamilleAnimal|Proxy findOrCreate(array $attributes)
 * @method static AssoHabitatFamilleAnimal|Proxy first(string $sortedField = 'id')
 * @method static AssoHabitatFamilleAnimal|Proxy last(string $sortedField = 'id')
 * @method static AssoHabitatFamilleAnimal|Proxy random(array $attributes = [])
 * @method static AssoHabitatFamilleAnimal|Proxy randomOrCreate(array $attributes = [])
 * @method static AssoHabitatFamilleAnimalRepository|RepositoryProxy repository()
 * @method static AssoHabitatFamilleAnimal[]|Proxy[] all()
 * @method static AssoHabitatFamilleAnimal[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static AssoHabitatFamilleAnimal[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static AssoHabitatFamilleAnimal[]|Proxy[] findBy(array $attributes)
 * @method static AssoHabitatFamilleAnimal[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static AssoHabitatFamilleAnimal[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class AssoHabitatFamilleAnimalFactory extends ModelFactory
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
            'familleAnimal' => FamilleAnimalFactory::new(),
            'habitat' => HabitatFactory::new(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(AssoHabitatFamilleAnimalFixtures $assoHabitatFamilleAnimal): void {})
        ;
    }

    protected static function getClass(): string
    {
        return AssoHabitatFamilleAnimal::class;
    }
}
