<?php

namespace App\Repository;

use App\Entity\MesureAccompagnement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MesureAccompagnement|null find($id, $lockMode = null, $lockVersion = null)
 * @method MesureAccompagnement|null findOneBy(array $criteria, array $orderBy = null)
 * @method MesureAccompagnement[]    findAll()
 * @method MesureAccompagnement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MesureAccompagnementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MesureAccompagnement::class);
    }

    // /**
    //  * @return MesureAccompagnement[] Returns an array of MesureAccompagnement objects
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
    public function findOneBySomeField($value): ?MesureAccompagnement
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
