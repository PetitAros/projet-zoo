<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    ## Route de la page index
    #[Route('/', name: 'app_index')]
    public function index(EventRepository $eventRepository): Response
    {
        $events = $eventRepository->findSomeRandom(20);
        return $this->render('index/index.html.twig', [
            'events' => $events,
        ]);
    }
}
