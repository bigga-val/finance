<?php

namespace App\Repository;

use App\Entity\PrescriptionLabo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrescriptionLabo|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrescriptionLabo|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrescriptionLabo[]    findAll()
 * @method PrescriptionLabo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrescriptionLaboRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrescriptionLabo::class);
    }

    // /**
    //  * @return PrescriptionLabo[] Returns an array of PrescriptionLabo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PrescriptionLabo
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
