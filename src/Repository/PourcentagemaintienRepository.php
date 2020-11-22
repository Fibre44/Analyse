<?php

namespace App\Repository;

use App\Entity\Pourcentagemaintien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pourcentagemaintien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pourcentagemaintien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pourcentagemaintien[]    findAll()
 * @method Pourcentagemaintien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PourcentagemaintienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pourcentagemaintien::class);
    }

    // /**
    //  * @return Pourcentagemaintien[] Returns an array of Pourcentagemaintien objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pourcentagemaintien
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
