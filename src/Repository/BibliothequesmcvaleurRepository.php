<?php

namespace App\Repository;

use App\Entity\Bibliothequesmcvaleur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bibliothequesmcvaleur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bibliothequesmcvaleur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bibliothequesmcvaleur[]    findAll()
 * @method Bibliothequesmcvaleur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BibliothequesmcvaleurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bibliothequesmcvaleur::class);
    }

    // /**
    //  * @return Bibliothequesmcvaleur[] Returns an array of Bibliothequesmcvaleur objects
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
    public function findOneBySomeField($value): ?Bibliothequesmcvaleur
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
