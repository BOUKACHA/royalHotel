<?php

namespace App\Controller;

use App\Repository\ChambreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontChambreController extends AbstractController
{
    #[Route('/chambre', name: 'app_front_chambre')]
    public function index(ChambreRepository $chambreRepository): Response
    {
        $chambres = $chambreRepository->findAll();
        return $this->render('front_chambre/index.html.twig', [
            'chambres'=>$chambres,
        ]);
    }
}
