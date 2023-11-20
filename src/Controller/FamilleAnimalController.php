<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FamilleAnimalController extends AbstractController
{
    #[Route('/famille_animal', name: 'app_famille_animal')]
    public function index(): Response
    {
        return $this->render('famille_animal/index.html.twig');
    }
}
