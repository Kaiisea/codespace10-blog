<?php

namespace App\Repository;

use App\Entity\Espacio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ESpacio>
 *
 * @method ESpacio|null find($id, $lockMode = null, $lockVersion = null)
 * @method ESpacio|null findOneBy(array $criteria, array $orderBy = null)
 * @method ESpacio[]    findAll()
 * @method ESpacio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ESpacioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Espacio::class);
    }

    public function add(Espacio $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Espacio $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ESpacio[] Returns an array of ESpacio objects
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

//    public function findOneBySomeField($value): ?ESpacio
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
