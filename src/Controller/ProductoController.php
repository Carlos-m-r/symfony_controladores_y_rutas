<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductoController extends AbstractController
{
    #[Route('/producto', name: 'app_producto')]
    public function index(): Response
    {
        return $this->render('producto/index.html.twig', [
            'controller_name' => 'ProductoController',
        ]);
    }

    #[Route('/producto/{id}', name: 'show_product', requirements: ['id'=>'\d+'])]
    public function showProduct($id): Response
    {
        return $this->render('producto/productoDetails.html.twig', [
            'productId' => $id
        ]);
    }

    #[Route('/producto/nuevo', name: 'add_product')]
    public function newProduct(): Response
    {
        return $this->render('producto/productoForm.html.twig', [

        ]);
    }
}
