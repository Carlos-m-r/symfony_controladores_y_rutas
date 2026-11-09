<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Attribute\Route;

final class TareasController extends AbstractController
{


        private array $list =  [
                1 => "Tarea1",
                2 => "Tarea2",
                3 => "Tarea3",
                4 => "Tarea4"
            ];



    #[Route('/tareas', name: 'app_tareas')]
    public function index($list): Response
    {
        // Obtenemos la lista actualizada de la sesión
        $list = $this->list;

        return $this->render('tareas/index.html.twig', [
            'tareas' => $list,
        ]);
    }

    #[Route('/tareas/nueva', name: 'new_tarea')]
    public function newTarea(): Response
    {
        return $this->render('tareas/newTarea.html.twig');
    }


    #[Route('/tareas/guardar', name: 'add_tarea', methods: ['POST'])]
    public function addTarea(Request $request): Response
    {
        $id = $request->request->get('id');
        $description = $request->request->get('description');

        $list = $this->list;

        $list +=["id" =>$id, "description" =>$description];

        return $this->render('tareas/index.html.twig', [
            'tareas' => $list,
        ]);
    }


        #[Route('/tareas/{id}', name: 'tarea_detail', requirements: ['id' => '\d+'])]
        public function showTareaDetail($id): Response
        {
            // Nota: Asegúrate de que las vistas 'tarea1.html.twig', etc., existan.
            return $this->render('tareas/tareaDetail.html.twig',[
                'tareaDetail' => $this->list[$id],
            ]);
        }

}
