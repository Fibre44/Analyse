<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Projet;
use App\Entity\Societe;
use App\Entity\Etablissement;

class ProjetFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $faker =\Faker\Factory::create('fr_FR');

      //Créer 10 projet fakées
        for($i=1; $i<=12;$i++){

            $projet = new Projet();
            $projet ->setTitre($faker->sentence())
                    ->setLogiciel($faker->sentence())
                    ->setSic("999999 $i")
                    ->setCreateAt($faker->dateTimeBetween('-6 months'))
                    ->setCreateur($faker->name());
        
            $manager->persist($projet);
        
            //créer des sociétés
        for($j=1; $j<=2;$j++){
            $societe=new Societe();
            $societe->setSiren("9999999$i")
                    ->setRaisonsociale($faker->name())
                    ->setAdresse($faker->sentence())
                    ->setCodepostal("79000")
                    ->setVille($faker->sentence())
                    ->setProjet($projet);
            
            $manager->persist($societe);
            
               //créer des établissements

        for($e=1; $e<=3;$e++){
               
            $etablissement=new Etablissement();
            $etablissement->setSiret("99999999999$e")
                            ->setLibelle($faker->name())
                            ->setAdresse($faker->sentence())
                            ->setCodepostal("79000")
                            ->setVille($faker->sentence())
                            ->setApe("9999")
                            ->setSociete($societe);
    
            $manager->persist($etablissement);

            }
        }
    }


        
        $manager->flush();
    }
}
