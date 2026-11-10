<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CatalogoController extends AbstractController
{
    private array $libros = [
        1 => [
            'titulo' => 'Don Quijote',
            'categoria' => 'novela',
            'descripcion' => 'Una novela clásica de Miguel de Cervantes.',
        ],
        2 => [
            'titulo' => 'La casa de Bernarda Alba',
            'categoria' => 'teatro',
            'descripcion' => 'Una obra teatral de Federico García Lorca.',
        ],
        3 => [
            'titulo' => 'El principito',
            'categoria' => 'fantasia',
            'descripcion' => 'Una historia sobre un pequeño príncipe.',
        ],
        4 => [
            'titulo' => 'Cien años de soledad',
            'categoria' => 'novela',
            'descripcion' => 'Una obra maestra del realismo mágico escrita por Gabriel García Márquez.',
        ],
        5 => [
            'titulo' => 'Bodas de sangre',
            'categoria' => 'teatro',
            'descripcion' => 'Una tragedia en verso y prosa escrita por Federico García Lorca.',
        ],
        6 => [
            'titulo' => 'El señor de los anillos',
            'categoria' => 'fantasia',
            'descripcion' => 'Una épica historia de fantasía heroica escrita por J.R.R. Tolkien.',
        ],
    ];

    #[Route('/catalogo', name: 'app_catalogo')]
    public function index(): Response
    {
        return $this->render('catalogo/index.html.twig', [
            'libros' => $this->libros,
        ]);
    }

    #[Route('/catalogo/categoria/{name}', name: 'catalogo_categoria')]
    public function category(string $name): Response
    {
        $librosFiltered = [];

        foreach ($this->libros as $id => $libro) {
            if ($libro['categoria'] === $name) {
                $librosFiltered[$id] = $libro;
            }
        }

        return $this->render('/catalogo/index.html.twig', [
            'libros' => $librosFiltered,
            'categoria' => $name,
        ]);
    }

    #[Route('/catalogo/{id}', name: 'catalogo_detail', requirements: ['id' => '\d+'])]
    public function detail(int $id): Response
    {
        if (!isset($this->libros[$id])) {
            throw $this->createNotFoundException('Libro no encontrado');
        }

        return $this->render('catalogo/detail.html.twig', [
            'libro' => $this->libros[$id],
            'id' => $id,
        ]);
    }

}
