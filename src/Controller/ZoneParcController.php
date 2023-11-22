<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ZoneParcController extends AbstractController
{
    #[Route('/zone/parc', name: 'app_zone_parc')]
    public function index(): Response
    {
        return $this->render('zone_parc/index.html.twig', [
            'controller_name' => 'ZoneParcController',
        ]);
    }
}
