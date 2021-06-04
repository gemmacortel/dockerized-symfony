<?php

namespace App\Infrastructure;

use App\Domain\Entity\Massage;
use App\Domain\MassageRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Massage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Massage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Massage[]    findAll()
 * @method Massage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MassageRepository extends ServiceEntityRepository implements MassageRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Massage::class);
    }

    // /**
    //  * @return Massage[] Returns an array of Massage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Massage
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function getMassagesList(): array
    {
        return $this->findAll();
    }
}
