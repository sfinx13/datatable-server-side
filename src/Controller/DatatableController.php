<?php

namespace App\Controller;

use App\DTO\Request\DataTableRequest;
use App\Entity\Employee;
use App\Entity\Product;
use App\Repository\EmployeeRepository;
use App\Service\DataTableHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DatatableController extends AbstractController
{
    #[Route('/', name: 'app_datatable')]
    public function index(): Response
    {
        return $this->render('datatable/index.html.twig');
    }

    #[Route('/datatable-product/{ressource}', name: 'app_datatable_ressource')]
    public function getProducts(
        DataTableHandler $dataTableHandler,
        DataTableRequest $dataTableRequest,
        string $ressource
    ): JsonResponse {
        $dataTableHandler->init('App\Entity'. '\\' . ucfirst($ressource));
        $dataTableHandler->handleRequest($dataTableRequest);

        return $dataTableHandler->getResponse();
    }

    #[Route('/view/{ressource}', name: 'app_datatable_views')]
    public function display(string $ressource): Response
    {
        return $this->render('datatable/' . $ressource . '.html.twig');
    }
}
