<?php

namespace App\Controller;

use App\Entity\AssoEventReservation;
use App\Entity\Billet;
use App\Entity\Event;
use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\BilletRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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

    /**
     * Application du controller de Reservation.
     *
     * Permet la redirection de l'utilisateur vers la page de choix d'un billet. Cette page est un affichage de bouton
     * présentant les différents tarifs et billets.
     */
    #[Route('/reservation/create', name : 'app_reservation_choose')]
    public function choose(BilletRepository $billetRepository): Response
    {
        if (!$this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('app_login');
        }
        $billets = $billetRepository->findAll();

        return $this->render('reservation/choose.html.twig', ['billets' => $billets]);
    }

    /**
     * Application du controller de Reservation.
     *
     * Permet la redirection de l'utilisateur vers la page de création d'une réservation. Cette création est composée
     * d'un formulaire ayant pour objectif de demander à l'utilisateur les modalités de sa reservation.
     *
     * @param Billet $billet
     */
    #[Route('/reservation/create/{id}', name: 'app_reservation_create')]
    public function create(#[MapEntity] Billet $billet, EntityManagerInterface $entityManager, Request $request): Response
    {
        if (!$this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('app_login');
        }

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

    /**
     * Application du controller de reservation.
     *
     * Permet la redirection vers une page de choix d'évènements. Cette page affiche tous les évènements correspondants à la date de la visite
     * reservée par l'utilisateur et permet à ce dernier d'en choisir. Ces évènements ne s'affichent que si le nombre de place disponible
     * est inférieur ou égale à la taille de la réservation effectuée.
     *
     * @param Reservation $reservation
     * @param EntityManagerInterface $entityManager
     * @param Request $request
     * @return Response
     */
    #[Route('/reservation/events/{id}', name: 'app_reservation_events')]
    public function events(#[MapEntity] Reservation $reservation, EntityManagerInterface $entityManager, Request $request): Response
    {
        if (!$this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('app_login');
        }

        $user = $this->getUser();

        if ($reservation->getUser() !== $user) {
            throw new AccessDeniedException('Vous n\avez pas la permission d\'accéder à cette page');
        }

        $nbPlacesReserv = $reservation->getNbPlacesChild() + $reservation->getNbPlacesAdult();

        $billet = $reservation->getBillet();
        $nbJours = $billet->getNbJours();
        $eventRepo = $entityManager->getRepository(Event::class);
        $events = $eventRepo->findFromDateToN(\DateTime::createFromInterface($reservation->getDateReservation()), $nbJours);
        $possibleEvents = [];
        foreach ($events as $event) {
            if ($nbPlacesReserv <= $event->getNbPlacesLibres()) {
                $possibleEvents[$event->getNomEvent()] = $event->getId();
            }
        }
        $form = $this->createFormBuilder();
        $form->add('events', ChoiceType::class, [
            'expanded' => true,
            'multiple' => true,
            'choices' => [
                'evenements' => $possibleEvents,
            ],
            'required' => false,
            'label' => 'Choix des évènements lors du séjour',
        ]);
        $form = $form->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $selectedEventsID = $form->get('events')->getData();
            foreach ($selectedEventsID as $eventID) {
                $reservationEvent = new AssoEventReservation();
                $reservationEvent->setReservation($reservation);
                $reservationEvent->setEvent($eventRepo->find($eventID));
                if (in_array($reservationEvent->getEvent(), $possibleEvents)) {
                    $entityManager->persist($reservationEvent);
                    $entityManager->flush();
                }
            }

            return $this->redirectToRoute('app_user');
        }

        return $this->render('reservation/event.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }
}
