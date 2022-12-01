<?php

namespace App\Controller;

use App\Entity\Company;
use App\Repository\CompanyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CompaniesController extends AbstractController
{
    #[Route('/companies', name: 'app_companies')]
    public function index(CompanyRepository $companyRepository): Response
    {

        $companies = $companyRepository->findAll();

        return $this->render('companies/index.html.twig', [
            'controller_name' => 'CompaniesController', 'companies'=>$companies,
        ]);
    }

    #[Route('/companies/{id}', name: 'show_company')]
    public function show(Company $company) : Response{
        // $id = $request->attributes->get('id');
        // $company = $companyRepository->find($id);
        return $this->render('companies/show.html.twig', ['company' => $company]);
    }
}
