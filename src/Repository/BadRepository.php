<?php

namespace App\Repository;

use App\Entity\Bad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Bad|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bad|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bad[]    findAll()
 * @method Bad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bad::class);
    }

    // /**
    //  * @return Bad[] Returns an array of Bad objects
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
    public function findOneBySomeField($value): ?Bad
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
