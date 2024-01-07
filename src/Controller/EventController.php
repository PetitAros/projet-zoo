<?php

namespace App\Controller;

use App\Entity\Event;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    /**
     * Permet d'envoyer la liste de tous les evènements vers la vue associée.
     *
     * @param EventRepository $eRep
     * @param Request $request
     * @return Response
     */
    #[Route('/event', name: 'app_event')]
    public function index(EventRepository $eRep, Request $request): Response
    {
        $value = $request->query->get('search');
        if (null == $value) {
            $value = '';
        }
        $events = $eRep->findSearch($value);

        return $this->render('Event/index.html.twig', ['events' => $events, 'action' => 'event','value'=>$value]);
    }

    /**
     * Permet d'envoyer les informations d'un évenement précis passé en paramètre vers la vue associée
     *
     * @param Event $event
     * @return Response
     */
    #[Route('/event/{id}', name: 'detail')]
    public function show(Event $event): Response
    {
        return $this->render('Event/show.html.twig', ['event' => $event]);
    }
}
