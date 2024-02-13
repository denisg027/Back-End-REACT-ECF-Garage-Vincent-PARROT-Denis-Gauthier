<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Routing\Annotation\Route;

class ApiAuthController extends AbstractController
{
    #[Route('/api/login', name: 'api_login', methods: ['POST'])]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // Récupérer l'erreur de connexion s'il y en a une
        $error = $authenticationUtils->getLastAuthenticationError();
        // Dernier nom d'utilisateur saisi par l'utilisateur
        $lastUsername = $authenticationUtils->getLastUsername();

        if ($error) {
            return $this->json([
                'message' => 'Mauvais login ou mot de passe!',
            ], Response::HTTP_UNAUTHORIZED);
        }

        // Récupérer l'utilisateur connecté
        $user = $this->getUser();
        return $this->json([
            'username' => $user->getUserIdentifier(),
            'role' => $user->getRoles(),
        ]);
    }

    #[Route('/api/logout', name: 'api_logout', methods: ['GET'])]
    public function logout()
    {
        // Le gestionnaire de déconnexion de Symfony s'occupera de cette partie
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
}