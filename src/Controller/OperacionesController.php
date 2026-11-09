<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


final class OperacionesController extends AbstractController
{


    #[Route('', name: 'operaciones')]
    public function index(): Response
    {
        return $this->render('operaciones/operaciones.html.twig', [
            'result' => 'Welcome to OperacionesController!'
        ]);
    }

    /*
     * cuadrado/{numero} debe devolver el cuadrado de numero. Por ejemplo, /cuadrado/6 debe devolver 36.
     */

    #[Route('/cuadrado/{number}', name: 'cuadrado')]
    public function cuadrado($number): Response
    {
        return $this->redirectToRoute('potencia', [
            'number1' => $number,
        ]);
    }
/*
* /suma/{a}/{b} debe devolver la suma de a y b. Por ejemplo, /suma/3/4 debe devolver 7.
*/

    #[Route('/suma/{number1}/{number2}', name: 'suma')]
    public function suma($number1, $number2): Response
    {
        $result =  $number1+$number2;
        return $this->render('operaciones/operaciones.html.twig', [
            'result' => 'Suma de ' . $number1 . ' + ' . $number2 . ' = ' . $result
        ]);
    }

    /*
     * /potencia/{base}/{exponente} debe devolver base elevado a exponente, y si no se indica el
     * exponente debe calcularse como si valiera 2: /potencia/5/3 debe devolver 125, y /potencia/5 debe devolver 25
     */


    #[Route('/potencia/{number1}', name: 'potencia', defaults: ['number2' => '2'])]
    #[Route('/potencia/{number1}/{number2}', name: 'suma')]
    public function potencia($number1, $number2): Response
    {
        $result =  $number1 ** $number2;
        return $this->render('operaciones/operaciones.html.twig', [
            'result' => 'Potencia de ' . $number1 . ' ^ ' . $number2 . ' = ' . $result
        ]);
    }
}
