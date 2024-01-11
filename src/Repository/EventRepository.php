<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Event>
 *
 * @method Event|null find($id, $lockMode = null, $lockVersion = null)
 * @method Event|null findOneBy(array $criteria, array $orderBy = null)
 * @method Event[]    findAll()
 * @method Event[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    /**
     * Méthode de classe de Event Repository.
     *
     * Retourne une liste aléatoire de $number event.
     *
     * @return Event[]
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
     * Méthode de classe de Event Repository.
     * Retourne une liste d'event dont le nom contient la chaîne de caractère passée en paramètre.
     *
     * @param string $txt chaîne de caractère à rechercher
     *
     * @return array Liste d'événements
     */
    public function findSearch(string $txt = '')
    {
        $request = $this->createQueryBuilder('event')
            ->where('event.nomEvent LIKE :txt')
            ->setParameter(':txt', '%'.$txt.'%')
            ->orderBy('event.nomEvent');
        $query = $request->getQuery()->execute();

        return array_filter($query, function ($item) {
            return $item instanceof Event;
        });
    }

    /**
     * Méthode de la classe EventRepository.
     * Retourne une liste d'event entre une date entrée en paramètre et la date présente après le nombre de jours entré
     * en paramètre.
     *
     * @param \DateTime $date    date de départ
     * @param int       $nbJours nombre de jours séparant cette date et la prochaine
     *
     * @return Event[] la liste d'évènement entre ces deux jours
     */
    public function findFromDateToN(\DateTime $date, int $nbJours): array
    {
        --$nbJours;

        $request = $this->createQueryBuilder('event')
            ->innerJoin('App:AssoEventDateEvent', 'aed', 'WITH', 'event = aed.event')
            ->innerJoin('App:DateEvent', 'de', 'WITH', 'aed.dateEvent = de')
            ->where("de.dateEvent BETWEEN :date AND DATE_ADD(:date,:jours, 'day')")
            ->setParameter('date', $date->format('Y-m-d'))
            ->setParameter('jours', $nbJours);
        $query = $request->getQuery()->execute();

        return array_filter($query, function ($item) {
            return $item instanceof Event;
        });
    }
    //    /**
    //     * @return Event[] Returns an array of Event objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Event
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
