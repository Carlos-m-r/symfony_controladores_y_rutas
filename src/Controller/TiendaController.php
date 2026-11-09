<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/tienda')]
final class TiendaController extends AbstractController
{
    #[Route('', name: 'app_tienda')]
    public function index(): Response
    {
        return $this->render('tienda/index.html.twig', [
            'output' => 'Tienda',
        ]);
    }
    #[Route('/catalogo', name: 'catalogo')]
    public function catalogue(): Response
    {
        return $this->render('tienda/index.html.twig', [
            'output' => 'Catálogo',
        ]);
    }

    #[Route('/carrito', name: 'carrito')]
    public function carrito(): Response
    {
        return $this->render('tienda/index.html.twig', [
            'output' => 'Carrito',
        ]);
    }
}

