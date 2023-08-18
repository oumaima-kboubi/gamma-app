<?php

namespace App\Controller;
header("Access-Control-Allow-Origin: *");
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

    #[Route('/bands/create', name: 'band_create', methods: ["POST","OPTIONS"])]
    public function create(string $nomGroupe, string $origine, string $ville, float $anneeDebut, float $anneeSeparation, string $fondateurs, int $membres, string $courantMusical, string $presentation):JsonResponse
    {
       return $this->bandService->create($nomGroupe,$origine,$ville,$anneeDebut,$anneeSeparation,$fondateurs,$membres,$courantMusical,$presentation);
    }
    #[Route('/bands/all', name: 'band_all', methods: ["GET","OPTIONS"])]
    public function getAll()
    {
        //dd($this->bandService->getAll());
       $bands= $this->bandService->getAll();
       return $bands;
    }
}
