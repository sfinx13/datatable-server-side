<?php

namespace App\Service;

use App\DTO\DataTable;
use App\DTO\Request\DataTableRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DataTableHandler
{
    private DataTableRequest $dataTableRequest;
    private string $entity;
    private DataTable $dataTable;
    private int $dataTableRecordsTotal;
    private int $dataTableRecordsFiltered;

    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function init(string $entity)
    {
        $this->entity = $entity;
        $this->dataTable = new DataTable();
    }

    public function handleRequest(DataTableRequest $dataTableRequest): void
    {
        $this->dataTableRequest = $dataTableRequest;
        if (null !== $this->dataTableRequest->getDraw()) {
            /** @var Paginator $paginator */
            $paginator = $this->getRepository()->getDataTablePaginator($this->dataTableRequest);

            $this->dataTable
                ->setDraw($this->dataTableRequest->getDraw())
                ->setRecordsTotal($paginator->count())
                ->setRecordsFiltered($paginator->count())
                ->setData($paginator->getIterator()->getArrayCopy());
        }
    }

    public function getResponse(): JsonResponse
    {
        if (null === $this->dataTableRequest->getDraw()) {
           return new JsonResponse([]);
        }
        return new JsonResponse($this->dataTable->toArray());
    }

    private function getRepository(): ServiceEntityRepository
    {
        return $this->entityManager->getRepository($this->entity);
    }
}
