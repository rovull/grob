<?php

namespace App\Repository;

use App\Entity\Terms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Terms|null find($id, $lockMode = null, $lockVersion = null)
 * @method Terms|null findOneBy(array $criteria, array $orderBy = null)
 * @method Terms[]    findAll()
 * @method Terms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TermsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Terms::class);
    }

    // /**
    //  * @return Terms[] Returns an array of Terms objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Terms
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function setTerms($name)
    {
        return $this->createQueryBuilder('u')
            ->where('u.id = 1')
            ->set('u.legalForm', '?4')
            ->setParameter(4, $name)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findTerms()
    {
        $conn = $this->getEntityManager()
        ->getConnection();
    $sql='SELECT * FROM terms ORDER BY id DESC LIMIT 1';

        try {
            $stmt = $conn->prepare($sql);
        } catch (DBALException $e) {
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
