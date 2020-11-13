<?php

namespace App\Repository;

use App\Entity\ExamensPhysiques;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExamensPhysiques|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamensPhysiques|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamensPhysiques[]    findAll()
 * @method ExamensPhysiques[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamensPhysiquesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamensPhysiques::class);
    }

    // /**
    //  * @return ExamensPhysiques[] Returns an array of ExamensPhysiques objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExamensPhysiques
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
