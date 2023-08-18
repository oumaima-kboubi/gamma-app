<?php
// src/Service/BandService.php

namespace App\Service;

use App\Entity\Band;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Persistence\ManagerRegistry;

class BandService
{
    private ManagerRegistry $doctrine;
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function create(string $nomGroupe, string $origin, string $ville, float $annéeDébut, float $annéeSéparation, string $fondateurs, int $membres, string $courantMusical, string $présentation)
    {
        $entityManager = $this->doctrine->getManager();
    
        $band = new Band();
        $band->setNomGroupe($nomGroupe);
        $band->setOrigine($origin);
        $band->setVille($ville);
        $band->setAnnéeDébut($annéeDébut);
        $band->setAnnéeSéparation($annéeSéparation);
        $band->setFondateurs($fondateurs);
        $band->setMembres($membres);
        $band->setCourantMusical($courantMusical);
        $band->setPrésentation($présentation);

        $entityManager->persist($band);
        $entityManager->flush();
        return new JsonResponse(200);
    }

    public function edit(int $id, array $data)
    {
        $entityManager = $this->doctrine->getManager();
        $band = $entityManager->getRepository(Band::class)->find($id);

        if (!$band) {
            return new JsonResponse('Band not found', 404);
        }



        $entityManager->flush();
        return new JsonResponse('Band updated', 200);
    }
    
    public function delete(int $id)
    {
        $entityManager = $this->doctrine->getManager();
        $band = $entityManager->getRepository(Band::class)->find($id);

        if (!$band) {
            return new JsonResponse('Band not found', 404);
        }

        $entityManager->remove($band);
        $entityManager->flush();
        return new JsonResponse('Band deleted', 200);
    }
    
    public function getAll()
    {
        $entityManager = $this->doctrine->getManager();
        $bands = $entityManager->getRepository(Band::class)->findAll();

    }

    public function getOne(int $id)
    {
        $entityManager = $this->doctrine->getManager();
        $band = $entityManager->getRepository(Band::class)->find($id);

        if (!$band) {
            return new JsonResponse('Band not found', 404);
        }

       
    }
}
