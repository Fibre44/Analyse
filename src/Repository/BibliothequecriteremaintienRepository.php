<?php

namespace App\Repository;

use App\Entity\Bibliothequecriteremaintien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bibliothequecriteremaintien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bibliothequecriteremaintien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bibliothequecriteremaintien[]    findAll()
 * @method Bibliothequecriteremaintien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BibliothequecriteremaintienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bibliothequecriteremaintien::class);
    }

    // /**
    //  * @return Bibliothequecriteremaintien[] Returns an array of Bibliothequecriteremaintien objects
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
    public function findOneBySomeField($value): ?Bibliothequecriteremaintien
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
