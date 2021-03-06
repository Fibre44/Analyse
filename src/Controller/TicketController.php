<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Projet;
use App\Entity\Anomalie;
use App\Entity\Solution;

use App\Repository\ProjetRepository;
use App\Repository\AnomalieRepository;

use App\Form\AnomalieType;
use App\Form\SolutionType;

class TicketController extends AbstractController
{
    /**
     * @Route("projet/{idprojet}/ticket/index", name="ticket_index")
     */
    public function index(Request $request,ProjetRepository $repo,$idprojet){
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repo->find($idprojet);

        return $this->render('ticket/index.html.twig', [
            'projet' =>$projet,
            'controller_name' => 'TicketController',
        ]);
    }
    /**
     * @Route("projet/{idprojet}/ticket/anomalie/new", name="anomalie_create")
     */
    public function addanomalie(Request $request,ProjetRepository $repo,$idprojet){
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repo->find($idprojet);

        $anomalie = new Anomalie;
        $form = $this->createForm(AnomalieType::class,$anomalie);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $projet->addAnomalie($anomalie);
            $entityManager->persist($anomalie);
            $entityManager->flush();

            return $this->redirectToRoute('ticket_index', ['idprojet' => $projet->getId()]);
        }

        return $this->render('ticket/anomalie_create.html.twig', [
            'projet'=>$projet,
            'formAnomalie'=>$form->createView(),
            'controller_name' => 'Creer une anomalie',
        ]);
    }
    /**
     * @Route("projet/{idprojet}/ticket/anomalie/{idanomalie}", name="solution_create")
     */
    public function addsolution(Request $request,ProjetRepository $repo,$idprojet,AnomalieRepository $repoanomalie,$idanomalie){
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repo->find($idprojet);
        $anomalie = $repoanomalie->find($idanomalie);

        $solution = new Solution;
        $form = $this->createForm(SolutionType::class,$solution);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $anomalie->addSolution($solution);
            $entityManager->persist($solution);
            $entityManager->flush();

            return $this->redirectToRoute('ticket_index', ['idprojet' => $projet->getId()]);
        }

        return $this->render('ticket/solution_create.html.twig', [
            'projet'=>$projet,
            'formSolution'=>$form->createView(),
            'controller_name' => 'Creer une solution',
        ]);
    }
}
