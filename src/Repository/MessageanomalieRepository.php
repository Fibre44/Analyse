<?php

namespace App\Repository;

use App\Entity\Messageanomalie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Messageanomalie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Messageanomalie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Messageanomalie[]    findAll()
 * @method Messageanomalie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessageanomalieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Messageanomalie::class);
    }

    // /**
    //  * @return Messageanomalie[] Returns an array of Messageanomalie objects
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
    public function findOneBySomeField($value): ?Messageanomalie
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
