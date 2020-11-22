<?php

namespace App\Repository;

use App\Entity\Bibliothequeclassification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bibliothequeclassification|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bibliothequeclassification|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bibliothequeclassification[]    findAll()
 * @method Bibliothequeclassification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BibliothequeclassificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bibliothequeclassification::class);
    }

    // /**
    //  * @return Bibliothequeclassification[] Returns an array of Bibliothequeclassification objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bibliothequeclassification
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
