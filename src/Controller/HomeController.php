<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController {
    #[Route('/',name: 'home')]
    public function accueil() : Response // ici Response correspond au type de l'info retournée par la méthode : un objet de type réponse  
    {
        return new Response('OK');
    }
}