<?php

namespace App\Repository;

use App\Entity\Bibliothequepopulationplandepaie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bibliothequepopulationplandepaie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bibliothequepopulationplandepaie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bibliothequepopulationplandepaie[]    findAll()
 * @method Bibliothequepopulationplandepaie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BibliothequepopulationplandepaieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bibliothequepopulationplandepaie::class);
    }

    // /**
    //  * @return Bibliothequepopulationplandepaie[] Returns an array of Bibliothequepopulationplandepaie objects
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
    public function findOneBySomeField($value): ?Bibliothequepopulationplandepaie
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
