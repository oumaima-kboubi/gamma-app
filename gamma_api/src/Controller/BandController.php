<?php

namespace App\Controller;

use App\Entity\Band;
use App\Service\BandService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;



class BandController extends AbstractController
{
    private BandService $bandService;
    public function __construct(BandService $bandService)
    {
        $this->bandService = $bandService;
    }
    #[Route('/band', name: 'app_band')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/BandController.php',
        ]);
    }
    //dumb function to test the db connection
    #[Route('/bands/create', name: 'band_create')]
    public function create(string $nomGroupe, string $origine, string $ville, float $annéeDébut, float $annéeSéparation, string $fondateurs, int $membres, string $courantMusical, string $présentation):JsonResponse
    {
       return $this->bandService->create($nomGroupe,$origine,$ville,$annéeDébut,$annéeSéparation,$fondateurs,$membres,$courantMusical,$présentation);
    }
}
