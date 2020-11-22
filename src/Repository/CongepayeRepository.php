<?php

namespace App\Repository;

use App\Entity\Congepaye;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Congepaye|null find($id, $lockMode = null, $lockVersion = null)
 * @method Congepaye|null findOneBy(array $criteria, array $orderBy = null)
 * @method Congepaye[]    findAll()
 * @method Congepaye[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CongepayeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Congepaye::class);
    }

    // /**
    //  * @return Congepaye[] Returns an array of Congepaye objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Congepaye
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
