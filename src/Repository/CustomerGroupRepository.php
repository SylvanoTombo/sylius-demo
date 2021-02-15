<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class CustomerGroupRepository extends EntityRepository
{
    public function findByName(?string $name, int $limit = 25): array
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.name LIKE :name')
            ->setParameter('name', '%' . $name . '%')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }
}
