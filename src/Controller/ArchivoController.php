<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ArchivoController extends AbstractController
{
    #[Route('/archivo/{anio}/{mes}/{dia}', name: 'archivo')]
    public function index(int $anio, ?int $mes = null, ?int $dia = null): Response
    {
        setlocale(LC_ALL, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain.1252');
        $dateObj   = DateTime::createFromFormat('!m', $mes);
        $monthName = strftime('%B', $dateObj->getTimestamp());


        if ($mes === null) {
            $fecha = "Año $anio";
        } elseif ($dia === null) {
            $fecha = "$monthName del año $anio";
        } else {
            $fecha = "$dia del mes de $monthName del año $anio";
        }

        return new Response($fecha);
    }
}
