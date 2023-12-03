<?php

namespace App\Repository;

use App\Entity\AssoEventDateEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AssoEventDateEvent>
 *
 * @method AssoEventDateEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method AssoEventDateEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method AssoEventDateEvent[]    findAll()
 * @method AssoEventDateEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssoEventDateEventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AssoEventDateEvent::class);
    }

//    /**
//     * @return AssoEventDateEvent[] Returns an array of AssoEventDateEvent objects
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

//    public function findOneBySomeField($value): ?AssoEventDateEvent
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
