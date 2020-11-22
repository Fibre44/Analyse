<?php

namespace App\Repository;

use App\Entity\Bibliothequesmcpopulation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bibliothequesmcpopulation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bibliothequesmcpopulation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bibliothequesmcpopulation[]    findAll()
 * @method Bibliothequesmcpopulation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BibliothequesmcpopulationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bibliothequesmcpopulation::class);
    }

    // /**
    //  * @return Bibliothequesmcpopulation[] Returns an array of Bibliothequesmcpopulation objects
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
    public function findOneBySomeField($value): ?Bibliothequesmcpopulation
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
