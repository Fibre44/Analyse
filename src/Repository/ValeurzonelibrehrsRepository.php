<?php

namespace App\Repository;

use App\Entity\Valeurzonelibrehrs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Valeurzonelibrehrs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Valeurzonelibrehrs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Valeurzonelibrehrs[]    findAll()
 * @method Valeurzonelibrehrs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValeurzonelibrehrsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Valeurzonelibrehrs::class);
    }

    // /**
    //  * @return Valeurzonelibrehrs[] Returns an array of Valeurzonelibrehrs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Valeurzonelibrehrs
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
