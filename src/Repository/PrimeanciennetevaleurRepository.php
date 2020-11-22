<?php

namespace App\Repository;

use App\Entity\Primeanciennetevaleur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Primeanciennetevaleur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Primeanciennetevaleur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Primeanciennetevaleur[]    findAll()
 * @method Primeanciennetevaleur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrimeanciennetevaleurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Primeanciennetevaleur::class);
    }

    // /**
    //  * @return Primeanciennetevaleur[] Returns an array of Primeanciennetevaleur objects
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
    public function findOneBySomeField($value): ?Primeanciennetevaleur
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
