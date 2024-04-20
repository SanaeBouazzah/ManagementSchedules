<?php

namespace App\Repository;

use App\Entity\Emploidutemps;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Emploidutemps>
 *
 * @method Emploidutemps|null find($id, $lockMode = null, $lockVersion = null)
 * @method Emploidutemps|null findOneBy(array $criteria, array $orderBy = null)
 * @method Emploidutemps[]    findAll()
 * @method Emploidutemps[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmploidutempsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Emploidutemps::class);
    }

    //    /**
    //     * @return Emploidutemps[] Returns an array of Emploidutemps objects
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

    //    public function findOneBySomeField($value): ?Emploidutemps
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
