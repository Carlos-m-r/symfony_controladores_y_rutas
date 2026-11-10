<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TareasController extends AbstractController
{
    private array $list = [
        1 => 'Tarea1',
        2 => 'Tarea2',
        3 => 'Tarea3',
        4 => 'Tarea4',
    ];

    #[Route('/tareas', name: 'tareas_lista', defaults: ['_format' => 'html'])]
    #[Route('/tareas.json', name: 'tareas_lista_json', defaults: ['_format' => 'json'])]
    public function index(string $_format = 'html'): Response
    {
        if ($_format === 'json') {
            return $this->json($this->list);
        }

        return $this->render('tareas/lista.html.twig', [
            'tareas' => $this->list,
        ]);
    }

    #[Route('/tareas/nueva', name: 'form_tarea', methods: ['GET'])]
    public function formTarea(): Response
    {
        return $this->render('tareas/newTarea.html.twig');
    }

    #[Route('/tareas/nueva', name: 'new_tarea', methods: ['POST'])]
    public function newTarea(Request $request): Response
    {

        $id = $request->request->get('id');
        $this->list[$id] = $request->request->get('description', '');

        return $this->render('tareas/index.html.twig', [
            'tareas' => $this->list,
        ]);
    }

    #[Route('/tareas/{id}', name: 'tarea_detail', requirements: ['id' => '\d+'])]
    public function showTareaDetail(int $id): Response
    {
        if (!isset($this->list[$id])) {
            throw $this->createNotFoundException('La tarea no existe.');
        }

        return $this->render('tareas/tareaDetail.html.twig', [
            'tareaDetail' => $this->list[$id],
        ]);
    }
}
