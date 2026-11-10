<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NuevoProductoController extends AbstractController
{
    #[Route('/productos/nuevo', name: 'new_producto')]
    public function create(Request $request): Response
    {

        $response = $this->render('nuevo_producto/index.html.twig', [
            'controller_name' => 'controller_name',
        ]);

        $response->setStatusCode(Response::HTTP_CREATED);

        return $response;
    }
}
