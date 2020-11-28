<?php

namespace App\Repository;

use App\Entity\Annuaireorganisme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Annuaireorganisme|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annuaireorganisme|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annuaireorganisme[]    findAll()
 * @method Annuaireorganisme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnuaireorganismeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annuaireorganisme::class);
    }

    // /**
    //  * @return Annuaireorganisme[] Returns an array of Annuaireorganisme objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Annuaireorganisme
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
