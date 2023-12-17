<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * UserController.
 * Permet la redirection vers les pages relatifs à l'utilisateur (User).
 */
class UserController extends AbstractController
{
    /**
     * Redirection vers la page de l'utilisateur.
     *
     * Redirige la personne vers une page contenant les informations de l'utilisateur qui tente d'y accéder.
     * Si aucun utilisateur n'est authentitifé, redirige vers la page de conexion.
     *
     * @return Response
     */
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        if (!$this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
