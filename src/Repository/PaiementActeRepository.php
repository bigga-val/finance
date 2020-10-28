<?php

namespace App\Repository;

use App\Entity\PaiementActe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PaiementActe|null find($id, $lockMode = null, $lockVersion = null)
 * @method PaiementActe|null findOneBy(array $criteria, array $orderBy = null)
 * @method PaiementActe[]    findAll()
 * @method PaiementActe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaiementActeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PaiementActe::class);
    }

    // /**
    //  * @return PaiementActe[] Returns an array of PaiementActe objects
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
    public function findOneBySomeField($value): ?PaiementActe
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
