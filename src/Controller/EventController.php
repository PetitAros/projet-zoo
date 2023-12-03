<?php

namespace App\Controller;

use App\Entity\Event;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    #[Route('/event', name: 'app_event')]
    public function index(EventRepository $eRep): Response
    {
        $events = $eRep->findAll();

        return $this->render('Event/index.html.twig',['events' => $events]);
    }

    #[Route('/event/{id}', name: 'detail')]
    public function show(Event $event): Response
    {
        return $this->render('Event/show.html.twig', ['event' => $event]);
    }
}
