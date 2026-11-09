<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SaludoController extends AbstractController
{
    #[Route('/saludo', name: 'app_saludo')]
    public function index(): Response
    {
        return $this->render('saludo/index.html.twig', [
        ]);
    }

    #[Route('/saludo/{nombre}', name: 'saludo-name')]
    public function saludoNombre(string $nombre): Response
    {
        return $this->render('saludo/saludo.html.twig', [
            'nombre' => $nombre
        ]);
    }
}
