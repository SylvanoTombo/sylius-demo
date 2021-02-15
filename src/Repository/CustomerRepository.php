<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\CoreBundle\Doctrine\ORM\CustomerRepository as BaseCustomerRepository;

class CustomerRepository extends BaseCustomerRepository
{
    public function findByNamePart(?string $name, int $limit = 25): array
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.firstName LIKE :name')
            ->orWhere('o.lastName LIKE :name')
            ->setParameter('name', '%' . $name . '%')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }
}
