<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use PhpOffice\PhpSpreadsheet\IOFactory;

class SpreadsheetController extends AbstractController
{
    #[Route('/spreadsheet', name: 'app_spreadsheet')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/SpreadsheetController.php',
        ]);
    }
     
    #[Route("/upload-excel", name:"xlsx", methods: ["POST"])]
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
            return('problem xslx');
        }
        // Read from the excel file using the IO factory
        $spreadsheet = IOFactory::load($fileFolder . $filePathName); 
        // Remove the first row
        $spreadsheet->getActiveSheet()->removeRow(1); 
        // Read data into an array
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true); 
        
        //show result in postman
        dd($sheetData);
        //return new Response(); 
    }
}
