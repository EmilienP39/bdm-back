<?php

namespace App\Repository;

use App\Entity\Interesser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Interesser>
 *
 * @method Interesser|null find($id, $lockMode = null, $lockVersion = null)
 * @method Interesser|null findOneBy(array $criteria, array $orderBy = null)
 * @method Interesser[]    findAll()
 * @method Interesser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InteresserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Interesser::class);
    }

//    /**
//     * @return Interesser[] Returns an array of Interesser objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Interesser
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
