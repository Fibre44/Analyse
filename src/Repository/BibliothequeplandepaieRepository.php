<?php

namespace App\Repository;

use App\Entity\Bibliothequeplandepaie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bibliothequeplandepaie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bibliothequeplandepaie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bibliothequeplandepaie[]    findAll()
 * @method Bibliothequeplandepaie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BibliothequeplandepaieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bibliothequeplandepaie::class);
    }

    // /**
    //  * @return Bibliothequeplandepaie[] Returns an array of Bibliothequeplandepaie objects
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
    public function findOneBySomeField($value): ?Bibliothequeplandepaie
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
