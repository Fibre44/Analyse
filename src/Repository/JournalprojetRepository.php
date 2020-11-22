<?php

namespace App\Repository;

use App\Entity\Journalprojet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Journalprojet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Journalprojet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Journalprojet[]    findAll()
 * @method Journalprojet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JournalprojetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Journalprojet::class);
    }

    // /**
    //  * @return Journalprojet[] Returns an array of Journalprojet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Journalprojet
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
