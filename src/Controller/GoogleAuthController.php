<?php

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/google/auth', name: 'app_google_auth_')]
class GoogleAuthController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function login(ClientRegistry $clientRegistry): Response
    {
        return $clientRegistry->getClient('google_client')->redirect(['openid'], []);
    }

    #[Route('/check', name: 'check')]
    public function check(ClientRegistry $clientRegistry): void
    {
    }
}
