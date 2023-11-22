<?php

namespace App\Controller;

use App\Entity\ZoneParc;
use App\Repository\FamilleAnimalRepository;
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

    #[Route('/zone_parc/{id}',name: 'app_zoneParc_details',requirements: ['id'=>'\d+'])]
    public function detailsZoneParc(FamilleAnimalRepository $repoAnimal,ZoneParc $Zone,int $idZone):Response{
        $animals=$repoAnimal->findAllByZone($idZone);

        return $this->render('zone_parc/detailZoneParc.html.twig',['zone'=>$Zone,'animals'=>$animals]);
    }
}
