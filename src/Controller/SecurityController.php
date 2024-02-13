<?php

// src/Controller/SecurityController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class SecurityController extends AbstractController
{
    #[Route('/api/login', name: 'api_login', methods: ['POST'])]
    public function login(Request $request, UserProviderInterface $userProvider, UserPasswordHasherInterface $passwordHasher, AuthenticationUtils $authenticationUtils): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $username = $data['email'] ?? '';
        $password = $data['password'] ?? '';

        try {
            $user = $userProvider->loadUserByIdentifier($username);

            // Annotation de docblock pour aider les outils d'analyse statique
            /** @var \App\Entity\Users $user */

            // Ou une assertion de type (PHP 7.4+)
            // assert($user instanceof \App\Entity\Users);

        } catch (\Exception $e) {
            return $this->json([
                'message' => 'Utilisateur non trouvé ou mot de passe incorrect',
            ], Response::HTTP_UNAUTHORIZED);
        }

        if (!$user || !$passwordHasher->isPasswordValid($user, $password)) {
            return $this->json([
                'message' => 'Email ou mot de passe incorrect',
            ], Response::HTTP_UNAUTHORIZED);
        }

        // Ici, vous devriez générer un token si vous utilisez une API stateless
        // Pour cet exemple, nous allons simplement simuler une connexion réussie

        return $this->json([
            'user'  => [
                'username' => $user->getUserIdentifier(), // getUserIdentifier remplace getUsername dans Symfony 5.3+
                'roles' => $user->getRoles(),
            ],
            'message' => 'Connexion réussie',
        ]);
    }
}