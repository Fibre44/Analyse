<?php

namespace App\Repository;

use App\Entity\Maintiendesalaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Maintiendesalaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Maintiendesalaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Maintiendesalaire[]    findAll()
 * @method Maintiendesalaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaintiendesalaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Maintiendesalaire::class);
    }

    // /**
    //  * @return Maintiendesalaire[] Returns an array of Maintiendesalaire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Maintiendesalaire
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
