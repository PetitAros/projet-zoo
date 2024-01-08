<?php

namespace App\Controller;

use App\Entity\AssoEventReservation;
use App\Entity\Billet;
use App\Entity\Event;
use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\BilletRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(): Response
    {
        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
        ]);
    }

    #[Route('/reservation/create', name : 'app_reservation_choose')]
    public function choose(BilletRepository $billetRepository): Response
    {
        $billets = $billetRepository->findAll();

        return $this->render('reservation/choose.html.twig', ['billets' => $billets]);
    }

    #[Route('/reservation/create/{id}', name: 'app_reservation_create')]
    public function create(#[MapEntity] Billet $billet, EntityManagerInterface $entityManager, Request $request): Response
    {
        $user = $this->getUser();
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $reservation = $form->getData();
            $reservation->setUser($user);
            $reservation->setBillet($billet);
            $entityManager->persist($reservation);
            $entityManager->flush();

            return $this->redirectToRoute('app_reservation_events', ['id' => $reservation->getId()]);
        }

        return $this->render('reservation/create.html.twig', ['reservation' => $reservation, 'form' => $form]);
    }

    #[Route('/reservation/events/{id}', name: 'app_reservation_events')]
    public function events(#[MapEntity] Reservation $reservation, EntityManagerInterface $entityManager, Request $request): Response
    {
        $nbPlacesReserv = $reservation->getNbPlacesChild() + $reservation->getNbPlacesAdult();

        $billet = $reservation->getBillet();
        $nbJours = $billet->getNbJours();
        $eventRepo = $entityManager->getRepository(Event::class);
        $events = $eventRepo->findFromDateToN(\DateTime::createFromInterface($reservation->getDateReservation()), $nbJours);
        $form = $this->createFormBuilder();
        foreach ($events as $event) {
            if ($event->getNbPlacesLibres() >= $nbPlacesReserv) {
                $form->add('events', CheckboxType::class, [
                    'value' => $event->getId(),
                ]);
            }
        }
        $form = $form->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $selectedEventsID = $form->get('events');
            foreach ($selectedEventsID as $eventID) {
                $reservationEvent = new AssoEventReservation();
                $reservationEvent->setReservation($reservation);
                $reservationEvent->setEvent($eventRepo->find($eventID));
            }

            return $this->redirectToRoute('app_user');
        }

        return $this->render('reservation/event.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }
}
