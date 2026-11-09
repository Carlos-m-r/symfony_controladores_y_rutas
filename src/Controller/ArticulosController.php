<?php

namespace App\Controller;

use phpDocumentor\Reflection\PseudoTypes\ValueOf;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

final class ArticulosController extends AbstractController
{
    #[Route('/articulos', name: 'app_articulos')]
    public function index(): Response
    {
        return $this->render('articulos/index.html.twig', [
            'controller_name' => 'ArticulosController',
        ]);
    }

    #[Route('/articulos/{integer}', name: 'articles_show', requirements: ['integer' => '\d+'])]
    public function showArticle($integer): Response
    {

            return $this->render('articulos/articulos.html.twig', [
                'output' => 'Artículo: ' . $integer,
            ]);

    }
}
