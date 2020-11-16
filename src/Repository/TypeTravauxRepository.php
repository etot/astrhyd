<?php

namespace App\Repository;

use App\Entity\TypeTravaux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeTravaux|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeTravaux|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeTravaux[]    findAll()
 * @method TypeTravaux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeTravauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeTravaux::class);
    }

    // /**
    //  * @return TypeTravaux[] Returns an array of TypeTravaux objects
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
    public function findOneBySomeField($value): ?TypeTravaux
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
