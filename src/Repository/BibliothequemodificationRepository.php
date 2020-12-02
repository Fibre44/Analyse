<?php

namespace App\Repository;

use App\Entity\Bibliothequemodification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bibliothequemodification|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bibliothequemodification|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bibliothequemodification[]    findAll()
 * @method Bibliothequemodification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BibliothequemodificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bibliothequemodification::class);
    }

    // /**
    //  * @return Bibliothequemodification[] Returns an array of Bibliothequemodification objects
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
    public function findOneBySomeField($value): ?Bibliothequemodification
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
