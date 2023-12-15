<?php
// src/Controller/ClubController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    #[Route('/api/clubs', name: 'get_clubs', methods: ['GET'])]
    public function getClubs(): JsonResponse
    {
        // Vous pouvez simplement renvoyer la réponse JSON-LD telle quelle
        $data = [
            'hydra:member' => [
                [
                    '@id' => '/api/clubs/1',
                    '@type' => 'Club',
                    'id' => 1,
                    'Name' => 'Golf BlueGreen de Saint-Jacques',
                    'Address' => 'Le Temple du Cerisier, Temple du Cerisier, 35136 Saint-Jacques-de-la-Lande',
                    // Ajoutez d'autres champs si nécessaire
                ],
                // Ajoutez d'autres clubs de la même manière
            ],
            // Ajoutez d'autres champs hydra si nécessaire
        ];

        return $this->json($data);
    }
}
