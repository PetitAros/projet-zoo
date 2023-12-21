<?php

namespace App\Repository;

use App\Entity\AssoEventReservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AssoEventReservation>
 *
 * @method AssoEventReservation|null find($id, $lockMode = null, $lockVersion = null)
 * @method AssoEventReservation|null findOneBy(array $criteria, array $orderBy = null)
 * @method AssoEventReservation[]    findAll()
 * @method AssoEventReservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssoEventReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AssoEventReservation::class);
    }

//    /**
//     * @return AssoEventReservation[] Returns an array of AssoEventReservation objects
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

//    public function findOneBySomeField($value): ?AssoEventReservation
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
