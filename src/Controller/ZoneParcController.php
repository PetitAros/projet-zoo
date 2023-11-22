<?php

namespace App\Controller;

use App\Repository\ZoneParcRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ZoneParcController extends AbstractController
{
    #[Route('/zone_parc', name: 'app_zone_parc')]
    public function index(ZoneParcRepository $zoneParcRepository): Response
    {
        $values=$zoneParcRepository->findAll();

        return $this->render('zone_parc/index.html.twig', [
            'zones_Parc' => $values,
        ]);
    }
}
