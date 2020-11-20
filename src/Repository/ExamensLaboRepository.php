<?php

namespace App\Repository;

use App\Entity\ExamensLabo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExamensLabo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamensLabo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamensLabo[]    findAll()
 * @method ExamensLabo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamensLaboRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamensLabo::class);
    }

    // /**
    //  * @return ExamensLabo[] Returns an array of ExamensLabo objects
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
    public function findOneBySomeField($value): ?ExamensLabo
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findOneByDesignation(string $designation)
    {

        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            '
            SELECT e FROM App\Entity\ExamensLabo e
            WHERE e.designation = :designation AND e.active = 1
            '
        )->setParameter('designation', $designation)
            ->getOneOrNullResult();
        return $query;
    }

}
