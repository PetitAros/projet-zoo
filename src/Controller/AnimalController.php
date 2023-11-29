<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    #[Route('/animal', name: 'app_animal')]
    public function index(AnimalRepository $animalRepository): Response
    {
        $animals = $animalRepository->findAll();
        return $this->render('animal/index.html.twig', [
            'controller_name' => 'AnimalController',
            'animals' => $animals,
        ]);
    }

    #[Route('/animal/{id}',
        name: 'app_animal_show',
        requirements:['id' => '\d+'])]
    public function show(
        #[MapEntity]
        Animal $animal)
    : Response {
        return $this->render('animal/show.html.twig', [
            'controller_name' => 'AnimalController',
            'animal' => $animal]);
    }
}
