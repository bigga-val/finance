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
    public function findByPatientByConsultation($signes, $patient){
        return $this->createQueryBuilder('p')
            ->join("p.consultation", "c")
            ->andWhere("c = :signes")
            ->setParameter("signes", $signes)
            ->andWhere("c.patient = :patient")
            ->setParameter("patient", $patient)
            ->getQuery()
            ->getResult();
    }

    public function findByGroupedByConsultation(){
        return $this->createQueryBuilder('e')
            ->andWhere('e.active = 1')
            ->groupBy('e.consultation')
            ->getQuery()
            ->getResult()
            ;
    }

    public function findForOneConsultation($consultation)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.active = 1')
            ->andWhere('e.consultation = :consultation')
            ->setParameter('consultation', $consultation)
            ->getQuery()
            ->getResult()
            ;
    }
}
