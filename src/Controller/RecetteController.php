<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Projet;
use App\Entity\Anomalie;
use App\Entity\Solution;
use App\Entity\Test;
use App\Entity\Testreponse;

use App\Repository\ProjetRepository;
use App\Repository\AnomalieRepository;
use App\Repository\TestRepository;

use App\Form\AnomalieType;
use App\Form\SolutionType;
use App\Form\TestType;
use App\Form\TestreponseType;

class RecetteController extends AbstractController
{
    /**
     * @Route("projet/{idprojet}/recette/index", name="recette_index")
     */
    public function index(Request $request,ProjetRepository $repo,$idprojet){
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repo->find($idprojet);

        return $this->render('recette/index.html.twig', [
            'projet' =>$projet,
            'controller_name' => 'RecetteController',
        ]);
    }
    
     /**
     * @Route("projet/{idprojet}/recette/test/new", name="test_create")
     */
    public function addtest(Request $request,ProjetRepository $repo,$idprojet){
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repo->find($idprojet);

        $test = new Test;
        $form = $this->createForm(TestType::class,$test);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $projet->addTest($test);
            $entityManager->persist($test);
            $entityManager->flush();

            return $this->redirectToRoute('testreponse_create', ['idprojet' => $projet->getId(),'idtest' => $test->getId()]);
        }

        return $this->render('recette/test_create.html.twig', [
            'projet'=>$projet,
            'formTest'=>$form->createView(),
            'controller_name' => 'Creer un test',
        ]);
    }
    /**
     * @Route("projet/{idprojet}/recette/test/{idtest}", name="testreponse_create")
     */
    public function addtestreponse(Request $request,ProjetRepository $repo,$idprojet, TestRepository $repotest, $idtest){
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repo->find($idprojet);
        $test = $repotest->find($idtest);

        $testreponse = new Testreponse;
        $form = $this->createForm(TestreponseType::class,$testreponse);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $test->addTestreponse($testreponse);
            $entityManager->persist($testreponse);
            $entityManager->flush();

            return $this->redirectToRoute('recette_index', ['idprojet' => $projet->getId()]);
        }

        return $this->render('recette/testreponse_create.html.twig', [
            'projet'=>$projet,
            'test'=>$test,
            'formTestreponse'=>$form->createView(),
            'controller_name' => 'Creer un test',
        ]);
    }

}
