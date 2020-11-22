<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Organisme;
use App\Form\OrganismeType;




class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/annuaireorganisme/new", name="annuaireorganisme_create")
     */
    public function form(Request $request){

        
        $entityManager = $this->getDoctrine()->getManager();


        $organisme= new Organisme;
        
        $form = $this->createForm(OrganismeType::class,$organisme);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $entityManager->persist($organisme);
            $entityManager->flush();

            return $this->redirectToRoute('admin');
        }
        return $this->render('organisme/create.html.twig',[

            'form'=>$form->createView()
        ]);    

    }

    
}

