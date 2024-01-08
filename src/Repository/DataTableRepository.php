<?php

namespace App\Repository;

use App\DTO\Request\DataTableRequest;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;

class DataTableRepository implements DataTableRepositoryInterface
{
    public function configureDataTableQueryBuilder(DataTableRequest $dataTableRequest): array
    {
        $firstResult = $dataTableRequest->getStart();
        $maxResult = $dataTableRequest->getLength();
        $where = $dataTableRequest->getSearch();
        $order = [
            $dataTableRequest->getColumns(mapped: true)[$dataTableRequest->getOrderColumn()],
            $dataTableRequest->getOrderDir()
        ];

        return [$firstResult, $maxResult, $where, $order];
    }

    public function getDataTablePaginator(DataTableRequest $dataTableRequest): Paginator
    {
        // TODO: Implement getDataTablePaginator() method.
    }

    public function getDataTableQueryBuilder(): QueryBuilder
    {
        // TODO: Implement getDataTableQueryBuilder() method.
    }
}
