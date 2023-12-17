<?php

namespace App\Controller;

use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use GuzzleHttp\Psr7\Request;
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
     * Route vers la page de l'utilisateur.
     *
     * Dirige la personne vers une page contenant les informations de l'utilisateur qui tente d'y accéder.
     * Si aucun utilisateur n'est authentitifé, redirige vers la page de conexion.
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

    /**
     * Route vers la page de modificaiton de l'utilisateur.
     *
     * Dirige la personne vers la page contenant son formulaire de modification.
     * Si aucun utilisateur n'est authentifié, redirige vers la page de connexion.
     */
    #[Route('/user/update', name: 'app_user_update')]
    public function update(Request $request, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('app_login');
        }
        $user = $this->getUser();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $entityManager->flush();
        }

        return $this->render('user/update.html.twig', [
            'controller_name' => 'UserController',
            'form' => $form,
        ]);
    }
}
