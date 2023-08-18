<?php

namespace App\Controller;

use App\Entity\Band;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;


class BandController extends AbstractController
{
    private ManagerRegistry $doctrine;
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
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
    public function create():JsonResponse
    {
        $entityManager = $this->doctrine->getManager();
    
        $band = new Band();
        $band->setOrigine('Test Origine');
        $band->setVille('Test Ville');
        $band->setAnnéeDébut(2010);
        $band->setAnnéeSéparation(2020);
        $band->setFondateurs('Test Fondateurs');
        $band->setMembres(4);
        $band->setCourantMusical('Test Courant Musical');
        $band->setPrésentation('Test Présentation');
    
        $entityManager->persist($band);
        $entityManager->flush();
        return new JsonResponse(200);
    }
}
