<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Societe;
use App\Entity\Projet;
use App\Entity\Rubrique;
use App\Repository\ProjetRepository;
use App\Repository\SocieteRepository;
use App\Repository\RubriqueRepository;
use App\Form\RubriqueType;



class RubriqueController extends AbstractController
{
    /**
     * @Route ("/projet/{idprojet}/societe/{idsociete}/rubrique/new", name="rubrique_create")
     */
    public function form(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);

        $rubrique = new Rubrique;

        $form = $this->createForm(RubriqueType::class,$rubrique);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $societe->addRubrique($rubrique);
            $entityManager->persist($rubrique);
            $entityManager->flush();

            return $this->redirectToRoute('projet_show', ['idprojet' => $projet->getId()]);
        }
        return $this->render('rubrique/create.html.twig',[

            'form'=>$form->createView()
        ]);    
        
    }
}
