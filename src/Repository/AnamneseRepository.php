<?php

namespace App\Repository;

use App\Entity\Anamnese;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Anamnese|null find($id, $lockMode = null, $lockVersion = null)
 * @method Anamnese|null findOneBy(array $criteria, array $orderBy = null)
 * @method Anamnese[]    findAll()
 * @method Anamnese[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnamneseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Anamnese::class);
    }

    // /**
    //  * @return Anamnese[] Returns an array of Anamnese objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Anamnese
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findOneByConsultation($consultation)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.Consultation = :consultation')
            ->setParameter('val', $consultation)
            ->getQuery()
            ->getOneorNullResult()
            ;
    }
}
