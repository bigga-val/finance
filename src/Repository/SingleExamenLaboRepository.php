<?php

namespace App\Repository;

use App\Entity\SingleExamenLabo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SingleExamenLabo|null find($id, $lockMode = null, $lockVersion = null)
 * @method SingleExamenLabo|null findOneBy(array $criteria, array $orderBy = null)
 * @method SingleExamenLabo[]    findAll()
 * @method SingleExamenLabo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SingleExamenLaboRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SingleExamenLabo::class);
    }

    // /**
    //  * @return SingleExamenLabo[] Returns an array of SingleExamenLabo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SingleExamenLabo
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findAllByExamen($id)
    {
        return $this->createQueryBuilder('s')
            ->where('s.examen_labo = :val')
            ->setParameter('val', $id)
            ->getQuery()
            ->getResult()
            ;
    }
}
