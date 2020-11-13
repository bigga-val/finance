<?php

namespace App\Repository;

use App\Entity\Conclusion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Conclusion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Conclusion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Conclusion[]    findAll()
 * @method Conclusion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConclusionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Conclusion::class);
    }

    // /**
    //  * @return Conclusion[] Returns an array of Conclusion objects
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
    public function findOneBySomeField($value): ?Conclusion
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
