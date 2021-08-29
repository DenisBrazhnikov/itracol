<?php

namespace App\Repository;

use App\Entity\Item;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Item|null find($id, $lockMode = null, $lockVersion = null)
 * @method Item|null findOneBy(array $criteria, array $orderBy = null)
 * @method Item[]    findAll()
 * @method Item[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Item::class);
    }

    public function getItemsFull()
    {
        return $this->createQueryBuilder('i')
            ->select('i')
            ->innerJoin('i.collection', 'c')
            ->addSelect('c')
            ->innerJoin('c.topic', 't')
            ->addSelect('t')
            ->setMaxResults(12)
            ->getQuery()
            ->getResult();
    }
}
