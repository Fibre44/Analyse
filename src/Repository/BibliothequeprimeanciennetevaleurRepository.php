<?php

namespace App\Repository;

use App\Entity\Bibliothequeprimeanciennetevaleur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bibliothequeprimeanciennetevaleur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bibliothequeprimeanciennetevaleur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bibliothequeprimeanciennetevaleur[]    findAll()
 * @method Bibliothequeprimeanciennetevaleur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BibliothequeprimeanciennetevaleurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bibliothequeprimeanciennetevaleur::class);
    }

    // /**
    //  * @return Bibliothequeprimeanciennetevaleur[] Returns an array of Bibliothequeprimeanciennetevaleur objects
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
    public function findOneBySomeField($value): ?Bibliothequeprimeanciennetevaleur
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
