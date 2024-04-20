<?php

namespace App\Repository;

use App\Entity\Periodeapprentissage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Periodeapprentissage>
 *
 * @method Periodeapprentissage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Periodeapprentissage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Periodeapprentissage[]    findAll()
 * @method Periodeapprentissage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeriodeapprentissageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Periodeapprentissage::class);
    }

    //    /**
    //     * @return Periodeapprentissage[] Returns an array of Periodeapprentissage objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Periodeapprentissage
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
