<?php

namespace App\Repository;

use App\Entity\Tauxabsence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tauxabsence|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tauxabsence|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tauxabsence[]    findAll()
 * @method Tauxabsence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TauxabsenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tauxabsence::class);
    }

    // /**
    //  * @return Tauxabsence[] Returns an array of Tauxabsence objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tauxabsence
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
