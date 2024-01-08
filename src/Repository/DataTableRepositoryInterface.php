<?php

namespace App\Repository;

use App\DTO\Request\DataTableRequest;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;

interface DataTableRepositoryInterface
{
    public function getDataTableQueryBuilder(): QueryBuilder;

    public function getDataTablePaginator(DataTableRequest $dataTableRequest): Paginator;

    public function configureDataTableQueryBuilder(DataTableRequest $dataTableRequest);
}
