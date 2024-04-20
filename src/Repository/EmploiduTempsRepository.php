<?php

namespace App\Repository;

use App\Entity\EmploiduTemps;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EmploiduTemps>
 *
 * @method EmploiduTemps|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmploiduTemps|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmploiduTemps[]    findAll()
 * @method EmploiduTemps[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmploiduTempsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmploiduTemps::class);
    }

    //    /**
    //     * @return EmploiduTemps[] Returns an array of EmploiduTemps objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?EmploiduTemps
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
