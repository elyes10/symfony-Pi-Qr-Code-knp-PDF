<?php

namespace App\Repository;

use App\Entity\Centrecamping;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Centrecamping|null find($id, $lockMode = null, $lockVersion = null)
 * @method Centrecamping|null findOneBy(array $criteria, array $orderBy = null)
 * @method Centrecamping[]    findAll()
 * @method Centrecamping[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CentrecampingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Centrecamping::class);
    }

    // /**
    //  * @return Centrecamping[] Returns an array of Centrecamping objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Centrecamping
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
