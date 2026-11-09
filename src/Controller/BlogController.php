<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/blog/{page}', name: 'blog_page', requirements: ['page' => '\d+' ])]
    public function showPage($page): Response
    {
        return $this->render('blog/page.html.twig', [
            'result' => 'Page' . $page,
        ]);
    }
    #[Route('/blog/{slug}', name: 'blog_show')]
    public function showContent($slug): Response
    {
        return $this->render('blog/page.html.twig', [
            'result' => 'Welcome to ' . $slug,
        ]);
    }
}
