<?php

namespace App\Controller;

use App\Entity\Billet;
use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\BilletRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

            return $this->redirectToRoute('app_user');
        }

        return $this->render('reservation/create.html.twig', ['form' => $form]);
    }

    #[Route('/reservation/events/{id}', name: 'app_reservation_events')]
    public function events(#[MapEntity] Reservation $reservation, Request $request): Response
    {

    }
}
