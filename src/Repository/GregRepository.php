<?php

namespace App\Repository;

use App\Entity\Greg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Greg>
 *
 * @method Greg|null find($id, $lockMode = null, $lockVersion = null)
 * @method Greg|null findOneBy(array $criteria, array $orderBy = null)
 * @method Greg[]    findAll()
 * @method Greg[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GregRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Greg::class);
    }

//    /**
//     * @return Greg[] Returns an array of Greg objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Greg
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
