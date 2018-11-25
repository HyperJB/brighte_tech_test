<?php

namespace App\Repository;

use App\Entity\ComputerParts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ComputerParts|null find($id, $lockMode = null, $lockVersion = null)
 * @method ComputerParts|null findOneBy(array $criteria, array $orderBy = null)
 * @method ComputerParts[]    findAll()
 * @method ComputerParts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComputerPartsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ComputerParts::class);
    }

    // /**
    //  * @return ComputerParts[] Returns an array of ComputerParts objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ComputerParts
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
