<?php

namespace App\Controller;

use App\Repository\VilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VilleController extends AbstractController
{
    #[Route('/villes', name: 'liste_villes')]
    public function index(VilleRepository $villeRepository): Response
    {

        $villes = $villeRepository->findAll();

        $liste_villes = ['Paris','Lyon','Marseille'];
        return $this->render('ville/liste.html.twig', [
            'villes' => $villes,
        ]);
    }
}
