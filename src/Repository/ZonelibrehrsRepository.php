<?php

namespace App\Repository;

use App\Entity\Zonelibrehrs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Zonelibrehrs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Zonelibrehrs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Zonelibrehrs[]    findAll()
 * @method Zonelibrehrs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZonelibrehrsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Zonelibrehrs::class);
    }

    // /**
    //  * @return Zonelibrehrs[] Returns an array of Zonelibrehrs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('z.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Zonelibrehrs
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
