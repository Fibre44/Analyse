<?php

namespace App\Repository;

use App\Entity\Bibliothequeccn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bibliothequeccn|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bibliothequeccn|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bibliothequeccn[]    findAll()
 * @method Bibliothequeccn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BibliothequeccnRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bibliothequeccn::class);
    }

    // /**
    //  * @return Bibliothequeccn[] Returns an array of Bibliothequeccn objects
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
    public function findOneBySomeField($value): ?Bibliothequeccn
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
