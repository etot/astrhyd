<?php

namespace App\Repository;

use App\Entity\DirectionRegionale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DirectionRegionale|null find($id, $lockMode = null, $lockVersion = null)
 * @method DirectionRegionale|null findOneBy(array $criteria, array $orderBy = null)
 * @method DirectionRegionale[]    findAll()
 * @method DirectionRegionale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DirectionRegionaleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DirectionRegionale::class);
    }

    // /**
    //  * @return DirectionRegionale[] Returns an array of DirectionRegionale objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DirectionRegionale
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
