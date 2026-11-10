<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ContactosController extends AbstractController
{
    private array $list = [
        [
            "name" => "Carlos",
            "phone" => "+34 555 555 55",
            "email" => "carlos@carlos.com"
        ],
        [
            "name" => "Juan",
            "phone" => "+34 666 666 66",
            "email" => "juan@juan.com"
        ],
        [
            "name" => "Cristina",
            "phone" => "+34 777 777 77",
            "email" => "cristina@cristina.com"
        ]

    ];

    #[Route('/contactos', name: 'app_contactos', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('contactos/index.html.twig', [
            'contactos' => $this->list,
        ]);
    }

    #[Route('/contactos/nuevo', name: 'form_nuevo', methods: ['GET'])]
    public function formContacto(): Response
    {
        return $this->render('contactos/newContacto.html.twig');
    }

    #[Route('/contactos/nuevo', name: 'new_contacto', methods: ['POST'])]
    public function newContacto(Request $request): Response
    {
        $this->list[] = [
            'name'  => $request->request->get('name', ''),
            'phone' => $request->request->get('phone', ''),
            'email' => $request->request->get('email', ''),
        ];

        return $this->render('contactos/index.html.twig', [
            'contactos' => $this->list,
        ]);
    }



    #[Route('/contactos/{name}', name: 'contacto_detail', methods: ['GET'])]
    public function showContactoDetail(string $name): JsonResponse
    {
        foreach ($this->list as $item) {
            if (strtolower($item['name']) === strtolower($name)) {
                return $this->json($item);
            }
        }

        return $this->json(
            ['error' => 'Contacto no encontrado'],
            Response::HTTP_NOT_FOUND
        );
    }
}
