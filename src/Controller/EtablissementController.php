<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Societe;
use App\Entity\Projet;
use App\Entity\Etablissement;
use App\Repository\ProjetRepository;
use App\Repository\SocieteRepository;
use App\Form\EtablissementType;

class EtablissementController extends AbstractController
{
    /**
     * @Route("/etablissement", name="etablissement")
     */
    public function index()
    {
        return $this->render('etablissement/index.html.twig', [
            'controller_name' => 'EtablissementController',
        ]);
    }

    /**
     * @Route ("/projet/{idprojet}/societe/{idsociete}/etablissement/new", name="etablissement_create")
     */

    public function form(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);

        $etablissement= new Etablissement;
        
        $form = $this->createForm(EtablissementType::class,$etablissement);

        $form->handleRequest($request);
       
        if($form->isSubmitted() && $form->isValid()){
            
            $societe->addEtablissement($etablissement);
            $entityManager->persist($etablissement);
            $entityManager->flush();

            return $this->redirectToRoute('projet_show', ['idprojet' => $projet->getId()]);
        }
        return $this->render('etablissement/create.html.twig',[

            'form'=>$form->createView()
        ]);    
    }
}
