<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Ville;
use App\Entity\Company;
use App\Entity\Aeroport;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Generation avec Faker
        $faker = Factory::create('fr_FR');


        //Generation a la main avec une boucle des villes + aeroports
        for($i=1; $i<=5; $i++){
        // $product = new Product();
        $aeroport = new Aeroport();
        $aeroport
            ->setNom('Aeroport '.$i)
            ->setNbPistes($i);
        // $manager->persist($product); equivalent de prepare en php natif
        $manager->persist($aeroport);


        $ville = new Ville();
        $ville
            ->setNom($faker->city())
            ->setDepartement($faker->departmentName())
            ->setPays('France')
            ->addAeroport($aeroport);
        $manager->persist($ville); 
        
        
        if($i %2 == 0){
            $aeroport = new Aeroport();
            $aeroport
                ->setNom('Aeroport '.$i.' bis')
                ->setNbPistes($i);
            $manager->persist($aeroport);
            $ville->addAeroport($aeroport);
        } 
        
        }

        // Generation des companies
        for($i=1; $i<=5; $i++){
            $company = new Company();
            $company->setNom('Compagnie '.$i)
                    ->setSigle('Comp '.$i)
                    ->setEmployes(mt_rand(50,1000));
            $manager->persist($company);
        }

        // equivalent de execute en php natif
        $manager->flush();
    }
}
