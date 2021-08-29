<?php

namespace App\Repository;

use App\Entity\UserCollection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserCollection|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserCollection|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserCollection[]    findAll()
 * @method UserCollection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserCollectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserCollection::class);
    }

    /**
     * @return array
     */
    public function getCollectionsWithMostItems()
    {
        $results = $this->createQueryBuilder('c')
            ->select('c')
            ->innerJoin('c.items', 'i')
            ->addSelect('COUNT(i.id) AS items_count')
            ->innerJoin('c.topic', 't')
            ->addSelect('t')
            ->groupBy('i.collection')
            ->orderBy('items_count', 'DESC')
            ->setMaxResults(8)
            ->getQuery()
            ->getResult();

        $collections = [];

        foreach ($results as $result) {
            $collection = $result[0];
            $collection->items_count = $result['items_count'];

            $collections[] = $collection;
        }

        return $collections;
    }

    public function getCollectionFull($id)
    {
        return $this->createQueryBuilder('c')
            ->select('c')
            ->innerJoin('c.items', 'i')
            ->addSelect('i')
            ->innerJoin('c.topic', 't')
            ->addSelect('t')
            ->where('c.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
