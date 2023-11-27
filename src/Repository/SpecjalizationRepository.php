<?php

namespace App\Repository;

use App\Entity\Specjalization;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Specjalization>
 *
 * @method Specjalization|null find($id, $lockMode = null, $lockVersion = null)
 * @method Specjalization|null findOneBy(array $criteria, array $orderBy = null)
 * @method Specjalization[]    findAll()
 * @method Specjalization[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecjalizationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Specjalization::class);
    }

//    /**
//     * @return Specjalization[] Returns an array of Specjalization objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Specjalization
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
