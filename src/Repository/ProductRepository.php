<?php

namespace App\Repository;

use App\DTO\Request\DataTableRequest;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository implements DataTableRepositoryInterface
{
    public function __construct(ManagerRegistry $registry, private DataTableRepository $dataTableRepository)
    {
        parent::__construct($registry, Product::class);
    }

    public function getDataTableQueryBuilder(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
            ->addSelect('p.category', 'p.name', 'p.price', 'p.quantity');
    }

    public function getDataTablePaginator(DataTableRequest $dataTableRequest): Paginator
    {
        [$firstResult, $maxResult, $where, $order] = $this->configureDataTableQueryBuilder($dataTableRequest);
        $queryBuilder = $this->getDataTableQueryBuilder();

        foreach ($where as $key => $value) {
            if (!empty($value)) {
                $queryBuilder
                    ->andWhere('p.' . $key . ' LIKE :' . $key)
                    ->setParameter($key, '%'.$value.'%');
            }
        }

        $queryBuilder->setFirstResult($firstResult)
            ->setMaxResults($maxResult)
            ->orderBy('p.' . $order[0], $order[1])
            ->getQuery();

        return new Paginator($queryBuilder, false);
    }

    public function configureDataTableQueryBuilder(DataTableRequest $dataTableRequest): array
    {
        return $this->dataTableRepository->configureDataTableQueryBuilder($dataTableRequest);
    }

}
