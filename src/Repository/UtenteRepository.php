<?php

namespace App\Repository;

use App\Entity\Utente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Utente|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utente|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utente[]    findAll()
 * @method Utente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtenteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Utente::class);
    }

//    /**
//     * @return Utente[] Returns an array of Utente objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Utente
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findAllRandom(){
        $qb = $this
            ->createQueryBuilder('u')
            ->select('u, g.nome as nomegruppo')
            ->join('App\Entity\Gruppo','g')
            ->where('g.id=u.gruppo')
            ->orderBy("RAND()")
            ->getQuery();
        return $qb->execute();
    }
}
