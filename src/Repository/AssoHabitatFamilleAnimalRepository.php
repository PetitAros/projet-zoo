<?php

namespace App\Repository;

use App\Entity\AssoHabitatFamilleAnimal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AssoHabitatFamilleAnimal>
 *
 * @method AssoHabitatFamilleAnimal|null find($id, $lockMode = null, $lockVersion = null)
 * @method AssoHabitatFamilleAnimal|null findOneBy(array $criteria, array $orderBy = null)
 * @method AssoHabitatFamilleAnimal[]    findAll()
 * @method AssoHabitatFamilleAnimal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssoHabitatFamilleAnimalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AssoHabitatFamilleAnimal::class);
    }

//    /**
//     * @return AssoHabitatFamilleAnimal[] Returns an array of AssoHabitatFamilleAnimal objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AssoHabitatFamilleAnimal
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
