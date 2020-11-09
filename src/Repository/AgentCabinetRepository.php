<?php

namespace App\Repository;

use App\Entity\AgentCabinet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AgentCabinet|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgentCabinet|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgentCabinet[]    findAll()
 * @method AgentCabinet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgentCabinetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AgentCabinet::class);
    }

    // /**
    //  * @return AgentCabinet[] Returns an array of AgentCabinet objects
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
    public function findOneBySomeField($value): ?AgentCabinet
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findOneByAgent($agent){
        $agent = $this->createQueryBuilder('a')
            ->where('a.agent = :agent')
            ->setParameter('agent', $agent)
            ->getQuery()
            ->getOneOrNullResult()
        ;
        return $agent;
    }

}
