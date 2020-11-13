<?php

namespace App\Repository;

use App\Entity\ComplementsAnamnese;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ComplementsAnamnese|null find($id, $lockMode = null, $lockVersion = null)
 * @method ComplementsAnamnese|null findOneBy(array $criteria, array $orderBy = null)
 * @method ComplementsAnamnese[]    findAll()
 * @method ComplementsAnamnese[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComplementsAnamneseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ComplementsAnamnese::class);
    }

    // /**
    //  * @return ComplementsAnamnese[] Returns an array of ComplementsAnamnese objects
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
    public function findOneBySomeField($value): ?ComplementsAnamnese
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
