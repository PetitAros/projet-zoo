<?php

namespace App\Repository;

use App\Entity\ZoneParc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ZoneParc>
 *
 * @method ZoneParc|null find($id, $lockMode = null, $lockVersion = null)
 * @method ZoneParc|null findOneBy(array $criteria, array $orderBy = null)
 * @method ZoneParc[]    findAll()
 * @method ZoneParc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZoneParcRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ZoneParc::class);
    }

//    /**
//     * @return ZoneParc[] Returns an array of ZoneParc objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('z')
//            ->andWhere('z.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('z.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ZoneParc
//    {
//        return $this->createQueryBuilder('z')
//            ->andWhere('z.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
