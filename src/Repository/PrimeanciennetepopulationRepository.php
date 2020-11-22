<?php

namespace App\Repository;

use App\Entity\Primeanciennetepopulation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Primeanciennetepopulation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Primeanciennetepopulation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Primeanciennetepopulation[]    findAll()
 * @method Primeanciennetepopulation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrimeanciennetepopulationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Primeanciennetepopulation::class);
    }

    // /**
    //  * @return Primeanciennetepopulation[] Returns an array of Primeanciennetepopulation objects
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
    public function findOneBySomeField($value): ?Primeanciennetepopulation
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
