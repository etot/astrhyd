<?php

namespace App\Repository;

use App\Entity\MoSuivis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MoSuivis|null find($id, $lockMode = null, $lockVersion = null)
 * @method MoSuivis|null findOneBy(array $criteria, array $orderBy = null)
 * @method MoSuivis[]    findAll()
 * @method MoSuivis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MoSuivisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MoSuivis::class);
    }

    // /**
    //  * @return MoSuivis[] Returns an array of MoSuivis objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MoSuivis
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
