<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Societe;
use App\Entity\Projet;
use App\Repository\ProjetRepository;
use App\Form\SocieteType;

class SocieteController extends AbstractController
{
    /**
     * @Route("societe", name="societe")
     */
    public function index()
    {
        return $this->render('societe/index.html.twig', [
            'controller_name' => 'SocieteController'
        ]);
    }

    /**
     * @Route ("/projet/{idprojet}/societe/new", name="societe_create")
     */

    public function form(Request $request,ProjetRepository $repo,$idprojet){
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repo->find($idprojet);

        $societe= new Societe();
       
        $form = $this->createForm(SocieteType::class,$societe);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $projet->addSociete($societe);
            $entityManager->persist($societe);
            $entityManager->flush();

            return $this->redirectToRoute('projet_show', ['idprojet' => $projet->getId()]);
        }
        return $this->render('societe/create.html.twig',[

            'form'=>$form->createView()
        ]);

    }
}
