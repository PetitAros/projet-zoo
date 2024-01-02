<?php

namespace App\Controller;

use App\Entity\FamilleAnimal;
use App\Repository\AnimalRepository;
use App\Repository\FamilleAnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FamilleAnimalController extends AbstractController
{
    #[Route('/famille_animal', name: 'app_famille_animal')]
    public function index(FamilleAnimalRepository $animalRepository): Response
    {
        $animaux=$animalRepository->findAll();
        return $this->render('famille_animal/index.html.twig', ['animaux' => $animaux,'action'=>'famille_animal']);
    }

    #[Route('/famille_animal/{id}', name: 'app_famille_animal_fambyid')]
    public function famById(FamilleAnimal $famAnId, AnimalRepository $animalRepository): Response
    {
        $animaux = $animalRepository->findBy(['famille' => $famAnId->getId()]);

        return $this->render('famille_animal/famById.html.twig', ['famille_animal' => $famAnId, 'animaux' => $animaux]);
    }
}
