<?php

namespace App\Controller;
header("Access-Control-Allow-Origin: *");
use App\Entity\Band;
use App\Service\BandService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;



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
       $bands= $this->bandService->getAll();
       return $bands;
    }
    #[Route('/bands/getOne/{id}', name: 'band_getOne', methods: ["GET","OPTIONS"])]
    public function getBandById($id)
    {
        $bands= $this->bandService->getBandById($id);
        return $bands;
    }
    #[Route('/bands/update/{id}', name: 'band_update', methods: ["POST","OPTIONS"])]
    public function update(Request $request,$id)
    {
        $bands= $this->bandService->update( $request,$id);
        return $bands;
    }
    #[Route('/bands/delete/{id}', name: 'band_delete', methods: ["DELETE"])]
    public function delete(int $id)
    {
        $deleted = $this->bandService->delete($id);

        if (!$deleted) {
            return new JsonResponse('Band not found', 404);
        }

        return new JsonResponse('Band deleted successfully', 200);
    }
}
