<?php

namespace App\Repository;

use App\Entity\BaseStockage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BaseStockage|null find($id, $lockMode = null, $lockVersion = null)
 * @method BaseStockage|null findOneBy(array $criteria, array $orderBy = null)
 * @method BaseStockage[]    findAll()
 * @method BaseStockage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BaseStockageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BaseStockage::class);
    }

    // /**
    //  * @return BaseStockage[] Returns an array of BaseStockage objects
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
    public function findOneBySomeField($value): ?BaseStockage
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
