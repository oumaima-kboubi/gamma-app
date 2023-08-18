<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Service\BandService;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class SpreadsheetController extends AbstractController
{
    private ManagerRegistry $doctrine;
    private BandService $bandService;
    public function __construct(ManagerRegistry $doctrine,BandService $bandService)
    {
        $this->doctrine = $doctrine;
        $this->bandService = $bandService;
    }

    #[Route('/spreadsheet', name: 'app_spreadsheet')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/SpreadsheetController.php',
        ]);
    }
     
    #[Route("/upload-excel", name:"xlsx", methods: ["POST","OPTIONS"])]
    public function xslx(Request $request): Response
    {
        // Get the file from the sent request
        $file = $request->files->get('file');
        // The folder in which the uploaded file will be stored
        $fileFolder = $this->getParameter('kernel.project_dir') . '/public/uploads/'; 
        // Generate a unique identifier for the file and concatenate it with the file extension using md5 function
        $filePathName = md5(uniqid()) . '.' . $file->getClientOriginalExtension(); 
        
        try {
            $file->move($fileFolder, $filePathName);
        } catch (FileException $e) {
            return $this->json('bands file not registered', 400); 
        }
        // Read from the excel file using the IO factory
        $spreadsheet = IOFactory::load($fileFolder . $filePathName); 
        // Remove the first row
        $spreadsheet->getActiveSheet()->removeRow(1); 
        // Read data into an array
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true); 
        
        foreach ($sheetData as $Row) 
        { 
                $nomGroupe = $Row['A'];  
                $origine = $Row['B']; 
                $ville= $Row['C'];     
                $annéeDébut =(float) $Row['D'];
                $annéeSéparation = (float) $Row['E'];
                $fondateurs = $Row['F'];
                $membres = (int) $Row['G'];
                $courantMusical = $Row['H'];
                $présentation = $Row['I'];
                $this->bandService->create(strval($nomGroupe),strval($origine),strval($ville),$annéeDébut,$annéeSéparation,strval($fondateurs),$membres,strval($courantMusical),strval($présentation));
        }
        return $this->json('bands registered', 200); 
}
}
