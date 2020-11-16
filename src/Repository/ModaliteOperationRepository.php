<?php

namespace App\Repository;

use App\Entity\ModaliteOperation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModaliteOperation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModaliteOperation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModaliteOperation[]    findAll()
 * @method ModaliteOperation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModaliteOperationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModaliteOperation::class);
    }

    // /**
    //  * @return ModaliteOperation[] Returns an array of ModaliteOperation objects
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
    public function findOneBySomeField($value): ?ModaliteOperation
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
