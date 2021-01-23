<?php

namespace App\Repository;

use App\Entity\Suplement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Suplement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Suplement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Suplement[]    findAll()
 * @method Suplement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuplementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Suplement::class);
    }

    // /**
    //  * @return Suplement[] Returns an array of Suplement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Suplement
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
