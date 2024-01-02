<?php

namespace App\Repository;

use App\Entity\FamilleAnimal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FamilleAnimal>
 *
 * @method FamilleAnimal|null find($id, $lockMode = null, $lockVersion = null)
 * @method FamilleAnimal|null findOneBy(array $criteria, array $orderBy = null)
 * @method FamilleAnimal[]    findAll()
 * @method FamilleAnimal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FamilleAnimalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FamilleAnimal::class);
    }

    /**
     * Méthode de classe de FamilleAnimal Repository.
     *
     * Retourne une liste aléatoire de $number famille d'animaux.
     *
     * @return FamilleAnimal[]
     */
    public function findSomeRandom(int $number): array
    {
        $allList = $this->findAll();
        shuffle($allList);
        $maxNumber = count($allList);
        if ($number > $maxNumber) {
            $number = $maxNumber;
        }

        return array_slice($allList, 0, $number);
    }

    /**
     * Méthode de classe de FamilleAnimalRepository.
     * Retourne une liste de famille d'animaux dont le nom contient la chaîne de caractère passée en paramètre.
     *
     * @param string $txt chaîne de caractère à rechercher
     *
     * @return array Liste de famille d'animaux
     */
    public function findSearch(string $txt = ''): array
    {
        $request = $this->createQueryBuilder('famille')
            ->where('famille.nomFamilleAnimal LIKE :txt')
            ->setParameter(':txt', '%'.$txt.'%')
            ->orderBy('famille.nomFamilleAnimal');

        $query = $request->getQuery()->execute();

        return array_filter($query, function ($item) {
            return $item instanceof FamilleAnimal;
        });
    }
    //    /**
    //     * @return FamilleAnimal[] Returns an array of FamilleAnimal objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?FamilleAnimal
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
