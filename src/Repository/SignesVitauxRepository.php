<?php

namespace App\Repository;

use App\Entity\SignesVitaux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SignesVitaux|null find($id, $lockMode = null, $lockVersion = null)
 * @method SignesVitaux|null findOneBy(array $criteria, array $orderBy = null)
 * @method SignesVitaux[]    findAll()
 * @method SignesVitaux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SignesVitauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SignesVitaux::class);
    }

    // /**
    //  * @return SignesVitaux[] Returns an array of SignesVitaux objects
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
    public function findOneBySomeField($value): ?SignesVitaux
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findByPatient($id)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            '
            SELECT s FROM App\Entity\SignesVitaux s
            WHERE s.patient = :id AND s.active = 1 
            ORDER BY s.created_at ASC
            '
        )->setParameter('id', $id);
        return $query->getResult();
    }

    public function findByCabinet($cabinet)
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            '
            SELECT s FROM App\Entity\SignesVitaux s
            WHERE s.cabinet = :cabinet AND s.active = 1 
            ORDER BY s.created_at ASC
            '
        )->setParameter('cabinet', $cabinet);
        return $query->getResult();
    }
}
