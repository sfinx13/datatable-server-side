<?php

namespace App\Repository;

use App\DTO\Request\DataTableRequest;
use App\Entity\Employee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Employee>
 *
 * @method Employee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employee[]    findAll()
 * @method Employee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeeRepository extends ServiceEntityRepository implements DataTableRepositoryInterface
{
    public function __construct(ManagerRegistry $registry, private DataTableRepository $dataTableRepository)
    {
        parent::__construct($registry, Employee::class);
    }

    public function getDataTableQueryBuilder(): QueryBuilder
    {
        return $this->createQueryBuilder('e')
            ->addSelect('e.name', 'e.position', 'e.office', 'e.age', 'e.salary');
    }

    public function getDataTablePaginator(DataTableRequest $dataTableRequest): Paginator
    {
        [$firstResult, $maxResult, $where, $order] = $this->configureDataTableQueryBuilder($dataTableRequest);
        $queryBuilder = $this->getDataTableQueryBuilder();

        foreach ($where as $key => $value) {
            if (!empty($value)) {
                $queryBuilder
                    ->andWhere('e.' . $key . ' LIKE :' . $key)
                    ->setParameter($key, '%'.$value.'%');
            }
        }

        $queryBuilder->setFirstResult($firstResult)
            ->setMaxResults($maxResult)
            ->orderBy('e.' . $order[0], $order[1])
            ->getQuery();

        return new Paginator($queryBuilder, false);
    }

    public function configureDataTableQueryBuilder(DataTableRequest $dataTableRequest): array
    {
        return $this->dataTableRepository->configureDataTableQueryBuilder($dataTableRequest);
    }
}
