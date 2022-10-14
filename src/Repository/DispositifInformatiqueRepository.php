<?php

namespace App\Repository;

use App\Entity\DispositifInformatique;
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
class DispositifInformatiqueRepository extends ServiceEntityRepository
{
    public const PAGINATOR_PER_PAGE = 2;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DispositifInformatique::class);
    }

    public function getDispositifinformatiquePaginator(int $offset): Paginator
        {
            $query = $this->createQueryBuilder('i')
                ->setMaxResults(self::PAGINATOR_PER_PAGE)
                ->setFirstResult($offset)
                ->getQuery()
            ;
    
            return new Paginator($query);
        }



    public function add(DispositifInformatique $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DispositifInformatique $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


//    /**
//     * @return DispositifInformatique[] Returns an array of DispositifInformatique objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DispositifInformatique
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
