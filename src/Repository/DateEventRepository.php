<?php

namespace App\Repository;

use App\Entity\DateEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DateEvent>
 *
 * @method DateEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method DateEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method DateEvent[]    findAll()
 * @method DateEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DateEventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DateEvent::class);
    }

//    /**
//     * @return DateEvent[] Returns an array of DateEvent objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DateEvent
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
