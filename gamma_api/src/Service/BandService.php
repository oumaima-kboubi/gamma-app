<?php
// src/Service/BandService.php
namespace App\Service;
header("Access-Control-Allow-Origin: *");

use App\Entity\Band;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BandService
{
    private ManagerRegistry $doctrine;
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function create(string $nomGroupe, string $origin, string $ville, float $anneeDebut, float $anneeSeparation, string $fondateurs, int $membres, string $courantMusical, string $presentation)
    {
        $entityManager = $this->doctrine->getManager();
    
        $band = new Band();
        $band->setNomGroupe($nomGroupe);
        $band->setOrigine($origin);
        $band->setVille($ville);
        $band->setanneeDebut($anneeDebut);
        $band->setanneeSeparation($anneeSeparation);
        $band->setFondateurs($fondateurs);
        $band->setMembres($membres);
        $band->setCourantMusical($courantMusical);
        $band->setpresentation($presentation);

        $entityManager->persist($band);
        $entityManager->flush();
        return new JsonResponse(200);
    }

    public function update(Request $request,int $id){
        $entityManager = $this->doctrine->getManager();
        $data = json_decode($request->getContent(), true);
    
        $band = $entityManager->getRepository(Band::class)->find($id);
    
        if (!$band) {
            return new JsonResponse('Band not found', 404);
        }
    
      /*  $band->setNomGroupe($data->getNomGroupe());
        $band->setOrigine($data->getOrigine());
        $band->setVille($data->getVille());
        $band->setanneeDebut($data->getanneeDebut());
        $band->setanneeSeparation($data->getanneeSeparation());
        $band->setFondateurs($data->getFondateurs());
        $band->setMembres($data->getMembres());
        $band->setCourantMusical($data->getCourantMusical());
        $band->setpresentation($data->getpresentation());
    
        $entityManager->flush();*/

        //because am sending an array and not an object
        $band->setNomGroupe($data['nomGroupe']);
        $band->setOrigine($data['origine']);
        $band->setVille($data['ville']);
        $band->setanneeDebut($data['anneeDebut']);
        $band->setanneeSeparation($data['anneeSeparation']);
        $band->setFondateurs($data['fondateurs']);
        $band->setMembres($data['membres']);
        $band->setCourantMusical($data['courantMusical']);
        $band->setpresentation($data['presentation']);
    
        $entityManager->flush();
    
        return new JsonResponse('Band updated successfully', 200);
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
        $bandEntities = $entityManager->getRepository(Band::class)->findAll();
        
         // Initialize an empty array to hold the band data
         $bands = [];
 
         // Loop through each band entity and extract the desired properties
         foreach ($bandEntities as $bandEntity) {
             $bands[] = [
                 'id' => $bandEntity->getId(),
                 'nomGroupe' => $bandEntity->getNomGroupe(),
                 'origine' => $bandEntity->getOrigine(),
                 'ville' => $bandEntity->getVille(),
                 'anneeDebut' => $bandEntity->getanneeDebut(),
                 'anneeSeparation' => $bandEntity->getanneeSeparation(),
                 'fondateurs' => $bandEntity->getFondateurs(),
                 'membres' => $bandEntity->getMembres(),
                 'courantMusical' => $bandEntity->getCourantMusical(),
                 'presentation' => $bandEntity->getpresentation(),
             ];
         }
 
         // Encode the array as JSON
         $jsonData = json_encode($bands);
         
         // Create a Response object with JSON content type and the encoded data
         $response = new Response($jsonData);
         $response->headers->set('Content-Type', 'application/json');
         
         // Allow CORS for your Angular app (replace with your actual Angular app URL)
         $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:4200');
         
         return $response;
        
    }

    public function getBandById(int $id)
    {
        $entityManager = $this->doctrine->getManager();
        $band = $entityManager->getRepository(Band::class)->find($id);
    
        if (!$band) {
            return new JsonResponse('Band not found', 404);
        } else {
            // Create an array representation of the band object
            $bandArray = [
                'id' => $band->getId(),
                'nomGroupe' => $band->getNomGroupe(),
                'origine' => $band->getOrigine(),
                'ville' => $band->getVille(),
                'anneeDebut' => $band->getAnneeDebut(),
                'anneeSeparation' => $band->getAnneeSeparation(),
                'fondateurs' => $band->getFondateurs(),
                'membres' => $band->getMembres(),
                'courantMusical' => $band->getCourantMusical(),
                'presentation' => $band->getPresentation(),
            ];
    
            // Convert the array to JSON format
            $jsonBand = json_encode($bandArray);
    
            // Create a JsonResponse with the serialized band data
            return new JsonResponse($jsonBand, 200, [], true);
        }
    }
}
