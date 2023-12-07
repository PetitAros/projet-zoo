<?php

namespace App\Controller;

use App\Repository\EventRepository;
use App\Repository\FamilleAnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    // # Route de la page index
    #[Route('/', name: 'app_index')]
    public function index(EventRepository $eventRepository, FamilleAnimalRepository $familleAnimalRepository): Response
    {
        $events = $eventRepository->findSomeRandom(20);
        $familles = $familleAnimalRepository->findSomeRandom(20);

        return $this->render('index/index.html.twig', [
            'events' => $events,
            'familles' => $familles,
        ]);
    }
}
