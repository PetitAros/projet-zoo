<?php

namespace App\Factory;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Animal>
 *
 * @method        Animal|Proxy create(array|callable $attributes = [])
 * @method static Animal|Proxy createOne(array $attributes = [])
 * @method static Animal|Proxy find(object|array|mixed $criteria)
 * @method static Animal|Proxy findOrCreate(array $attributes)
 * @method static Animal|Proxy first(string $sortedField = 'id')
 * @method static Animal|Proxy last(string $sortedField = 'id')
 * @method static Animal|Proxy random(array $attributes = [])
 * @method static Animal|Proxy randomOrCreate(array $attributes = [])
 * @method static AnimalRepository|RepositoryProxy repository()
 * @method static Animal[]|Proxy[] all()
 * @method static Animal[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Animal[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Animal[]|Proxy[] findBy(array $attributes)
 * @method static Animal[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Animal[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class AnimalFactory extends ModelFactory
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
     * Fonction de création d'un animal au hasard.
     *
     * L'animal se voit définir :
     * - Une caractéristiques aléatoire (Chaine de 128 lettres)
     * - une date de naissance aléatoire datant d'entre 20 et 10 ans dans le passé
     * - un nom au hasard
     * - un poids au hasard en kg (2 décimales maximum, compris entre 0 et 6000
     * - une taille au hasard en cm (2 décimales maximum, compris entre 0 et 800
     * - Une date de décès avec 33% de chance, aléatoire, datant d'entre 10 ans dans le passé et aujourd'hui
     *
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        $result = [
            'caracteristique' => self::faker()->text(128),
            'dateNaissance' => self::faker()->dateTimeInInterval('-20 years', '+10 years'),
            'nom' => self::faker()->firstName(),
            'poids' => self::faker()->randomFloat(2,0,6000),
            'taille' => self::faker()->randomFloat(2,0,800),
        ];
        if (self::faker()->boolean(33))
        {
            $result['dateMort'] = self::faker()->dateTimeInInterval('-10 years', '+10 years');
        }
        return $result;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Animal $animal): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Animal::class;
    }
}
