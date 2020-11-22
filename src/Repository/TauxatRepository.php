<?php

namespace App\Repository;

use App\Entity\Tauxat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tauxat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tauxat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tauxat[]    findAll()
 * @method Tauxat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TauxatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tauxat::class);
    }

    // /**
    //  * @return Tauxat[] Returns an array of Tauxat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tauxat
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
