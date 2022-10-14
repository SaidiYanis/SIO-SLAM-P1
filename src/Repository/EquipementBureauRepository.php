<?php

namespace App\Repository;

use App\Entity\EquipementBureau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @extends ServiceEntityRepository<EquipementBureau>
 *
 * @method EquipementBureau|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipementBureau|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipementBureau[]    findAll()
 * @method EquipementBureau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipementBureauRepository extends ServiceEntityRepository
{
    public const PAGINATOR_PER_PAGE = 2;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquipementBureau::class);
    }

    public function getEquipementbureauPaginator(int $offset): Paginator
        {
            $query = $this->createQueryBuilder('e')
                ->setMaxResults(self::PAGINATOR_PER_PAGE)
                ->setFirstResult($offset)
                ->getQuery()
            ;
    
            return new Paginator($query);
        }



    public function add(EquipementBureau $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EquipementBureau $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    
//    /**
//     * @return EquipementBureau[] Returns an array of EquipementBureau objects
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

//    public function findOneBySomeField($value): ?EquipementBureau
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
