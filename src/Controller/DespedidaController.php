<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DespedidaController extends AbstractController
{
    #[Route('/despedida', name: 'app_despedida')]
    public function index(): Response
    {
        return $this->redirectToRoute('app_saludo', [
            'controller_name' => 'DespedidaController',
        ]);
    }
}
