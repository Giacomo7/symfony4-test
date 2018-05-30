<?php

namespace App\Repository;

use App\Entity\Gruppo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Gruppo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gruppo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gruppo[]    findAll()
 * @method Gruppo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GruppoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Gruppo::class);
    }

//    /**
//     * @return Gruppo[] Returns an array of Gruppo objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gruppo
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
