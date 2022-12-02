<?php

namespace App\Controller;


use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        
        // Le form->isValid() verifie si les contraintes du controller sont respéctées , sans ça on aurait juste les messages d'erreur mais pas de blocage de l'envoie
        if($form->isSubmitted() && $form->isValid()){
            dd($form->getData());
        }

        return $this->render('contact/index.html.twig', [
            'formulaire' => $form->createView(),
        ]);
    }
}
