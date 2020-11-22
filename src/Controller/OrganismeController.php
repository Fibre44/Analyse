<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;


use App\Entity\Projet;
use App\Entity\Etablissement;
use App\Entity\Organisme;
use App\Repository\ProjetRepository;
use App\Repository\EtablissementRepository;
use App\Repository\AnnuaireorganismeRepository;
use App\Form\OrganismeType;



class OrganismeController extends AbstractController
{
    /**
     * @Route("/organisme", name="organisme")
     */
    public function index()
    {
        return $this->render('organisme/index.html.twig', [
            'controller_name' => 'OrganismeController',
        ]);
    }

    /**
     * @Route ("/projet/{idprojet}/etablissement/{idetablissement}/organisme/new", name="organisme_create")
    */
    
    public function form(Request $request,ProjetRepository $repoprojet,$idprojet,EtablissementRepository $repoetablissement,$idetablissement){

        
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $etablissement = $repoetablissement->find($idetablissement);

        $organisme= new Organisme;
        
        $form = $this->createForm(OrganismeType::class,$organisme);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $etablissement->addOrganisme($organisme);
            $entityManager->persist($organisme);
            $entityManager->flush();

            return $this->redirectToRoute('projet_show', ['idprojet' => $projet->getId()]);
        }
        return $this->render('organisme/create.html.twig',[

            'form'=>$form->createView()
        ]);    

    }

    
      
    

}
