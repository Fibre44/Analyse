<?php

namespace App\Repository;

use App\Entity\Tablemaintien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tablemaintien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tablemaintien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tablemaintien[]    findAll()
 * @method Tablemaintien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TablemaintienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tablemaintien::class);
    }

    // /**
    //  * @return Tablemaintien[] Returns an array of Tablemaintien objects
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
    public function findOneBySomeField($value): ?Tablemaintien
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
