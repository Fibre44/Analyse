<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Bibliothequeccn;
use App\Entity\Bibliothequeclassification;
use App\Entity\Bibliothequecriteremaintien;
use App\Entity\Bibliothequetablemaintien;
use App\Entity\Bibliothequeprimeanciennetepopulation;
use App\Entity\Bibliothequeprimeanciennetevaleur;
use App\Entity\Bibliothequesmcvaleur;
use App\Entity\Bibliothequesmcpopulation;
use App\Entity\Utilisateur;
use App\Entity\Projet;
use App\Entity\Conventioncollective;
use App\Entity\Annuaireorganisme;
use App\Entity\Bibliothequemodification;

use App\Repository\BibliothequeccnRepository;
use App\Repository\BibliothequeclassificationRepository;
use App\Repository\BibliothequecriteremaintienRepository;
use App\Repository\BibliothequetablemaintienRepository;
use App\Repository\BibliothequeprimeancienneteRepository;
use App\Repository\BibliothequeprimeanciennetepopulationRepository;
use App\Repository\BibliothequesmcpopulationRepository;
use App\Repository\ProjetRepository;
use App\Repository\UtilisateurRepository;
use App\Repository\ConventioncollectiveRepository;

use App\Form\BibliothequeccnType;
use App\Form\BibliothequeclassificationType;
use App\Form\BibliolthequecriteremaintienType;
use App\Form\BibliothequetablemaintienType;
use App\Form\BibliothequeprimeanciennetepopulationType;
use App\Form\BibliothequeprimeanciennetevaleurType;
use App\Form\BibliothequesmcvaleurType;
use App\Form\BibliothequesmcpopulationType;
use App\Form\AnnuaireorganismeType;
use App\Form\BibliothequemodificationType;



class BibliothequeccnController extends AbstractController
{
    /**
     * @Route("/bibliothequeccn/liste_ccn", name="bibliothequeccn")
    */
    public function index(BibliothequeccnRepository $repobibliothequeccn)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $listeccn = $repobibliothequeccn->findAll();

        return $this->render('bibliothequeccn/index.html.twig', [
            'listeccn'=>$listeccn,
            'controller_name' => 'BibliothequeccnController',
        ]);
    }


    /**
     * @Route("/bibliothequeccn/{idbibliothequeccn}/show", name="bibliothequeccn_show")
    */


    public function showbibliothequeccn(Request $request,BibliothequeccnRepository $repobibliothequeccn,$idbibliothequeccn){
        $entityManager = $this->getDoctrine()->getManager();

        $ccn = $repobibliothequeccn->find($idbibliothequeccn);
        
        return $this->render('bibliothequeccn/bibliothequeccn_show.html.twig', [
            'ccn'=>$ccn,
            'controller_name' => 'BibliothequeccnController',
        ]);

    }

    /**
     * @Route("/bibliothequeccn/new", name="bibliothequeccn_create")
    */
    public function addbibliothequeccn(Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $bibliothequeccn = new Bibliothequeccn();
        $form = $this->createForm(BibliothequeccnType::class,$bibliothequeccn);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $entityManager->persist($bibliothequeccn);
            $entityManager->flush();

            return $this->redirectToRoute('bibliotheque_classification_create', ['idbibliothequeccn'=>$bibliothequeccn->getId()]);
        }

        return $this->render('bibliothequeccn/bibliothequeccn_create.html.twig', [
            'formCcn'=>$form->createView()
        ]);
    }

    /**
     * @Route("/bibliothequeccn/{idbibliothequeccn}/classification/new", name="bibliotheque_classification_create")
    */
    public function addbibliothequeclassification(Request $request,BibliothequeccnRepository $repobibliothequeccn,$idbibliothequeccn)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $bibliothequeccn = $repobibliothequeccn->find($idbibliothequeccn);
        $bibliothequeclassification = new Bibliothequeclassification();

        $form = $this->createForm(BibliothequeclassificationType::class,$bibliothequeclassification);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $bibliothequeclassification->setStatut('En attente');
            $bibliothequeccn->addBibliothequeclassification($bibliothequeclassification);
            $entityManager->persist($bibliothequeclassification);
            $entityManager->flush();

            return $this->redirectToRoute('bibliotheque_classification_create', ['idbibliothequeccn'=>$bibliothequeccn->getId()]);
        }

        return $this->render('bibliothequeccn/bibliothequeclassification_create.html.twig',[
            'bibliothequeccn'=>$bibliothequeccn,
            'formClassification'=>$form->createView()
    
        ]);
    }

    /**
     * @Route("/bibliothequeccn/{idbibliothequeccn}/criteremaintien/new", name="bibliotheque_criteremaintien_create")
    */

    public function addbibliothequecriteremaintien(Request $request,BibliothequeccnRepository $repobibliothequeccn,$idbibliothequeccn)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $bibliothequeccn = $repobibliothequeccn->find($idbibliothequeccn);
        $bibliothequecriteremaintien = new Bibliothequecriteremaintien();

        $form = $this->createForm(BibliolthequecriteremaintienType::class,$bibliothequecriteremaintien);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $bibliothequeccn->addBibliothequecriteremaintien($bibliothequecriteremaintien);
            $entityManager->persist($bibliothequecriteremaintien);
            $entityManager->flush();

            return $this->redirectToRoute('bibliotheque_tablemaintien_create', ['idbibliothequeccn'=>$bibliothequeccn->getId(),'idbibliothequecriteremaintien'=>$bibliothequecriteremaintien->getId()]);
        }

        return $this->render('bibliothequeccn/bibliothequecriteremaintien_create.html.twig', [
            'bibliothequeccn'=>$bibliothequeccn,
            'formCriteremaintien'=>$form->createView()
        ]);
    }
    
    /**
     * @Route("/bibliothequeccn/{idbibliothequeccn}/criteremaintien/{idbibliothequecriteremaintien}/tablemaintien/new", name="bibliotheque_tablemaintien_create")
    */

    public function addbibliothequetablemaintien(Request $request,BibliothequeccnRepository $repobibliothequeccn,$idbibliothequeccn,BibliothequecriteremaintienRepository $repobibliothequecriteremaintien, $idbibliothequecriteremaintien)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $bibliothequeccn = $repobibliothequeccn->find($idbibliothequeccn);
        $bibliothequecriteremaintien = $repobibliothequecriteremaintien->find($idbibliothequecriteremaintien);

        $bibliothequetablemaintien = new Bibliothequetablemaintien();
    

        $form = $this->createForm(BibliothequetablemaintienType::class,$bibliothequetablemaintien);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $bibliothequecriteremaintien->addBibliothequetablemaintien($bibliothequetablemaintien);
            $entityManager->persist($bibliothequetablemaintien);
            $entityManager->flush();

            return $this->redirectToRoute('bibliotheque_tablemaintien_create', ['idbibliothequeccn'=>$bibliothequeccn->getId(),'idbibliothequecriteremaintien'=>$bibliothequecriteremaintien->getId()]);
        }

        return $this->render('bibliothequeccn/bibliothequetablemaintien_create.html.twig', [
            'bibliothequeccn'=>$bibliothequeccn,
            'bibliothequecriteremaitien'=>$bibliothequecriteremaintien,
            'formTauxmaintien'=>$form->createView()
        ]);
    }
    
    /**
     * @Route("/bibliothequeccn/{idbibliothequeccn}/primeanciennetepopulation/new", name="bibliotheque_primeanciennetepopulation_create")
    */

    public function addbibliothequeprimeanciennete(Request $request,BibliothequeccnRepository $repobibliothequeccn,$idbibliothequeccn)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $bibliothequeccn = $repobibliothequeccn->find($idbibliothequeccn);
        $bibliothequeprimeanciennete = new Bibliothequeprimeanciennetepopulation();

        $form = $this->createForm(BibliothequeprimeanciennetepopulationType::class,$bibliothequeprimeanciennete);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $bibliothequeccn->addBibliothequeprimeanciennetepopulation($bibliothequeprimeanciennete);
            $entityManager->persist($bibliothequeprimeanciennete);
            $entityManager->flush();

            return $this->redirectToRoute('bibliotheque_primeanciennetevaleur_create', ['idbibliothequeccn'=>$bibliothequeccn->getId(),'idprimeanciennetepopulation'=>$bibliothequeprimeanciennete->getId()]);
        }

        return $this->render('bibliothequeccn/bibliothequeprimeanciennetepopulation_create.html.twig', [
            'bibliothequeccn'=>$bibliothequeccn,
            'formPrimeanciennetepopulation'=>$form->createView()
        ]);
    }

    /**
     * @Route("/bibliothequeccn/{idbibliothequeccn}/primeanciennetepopulation/{idprimeanciennetepopulation}/tableanciennete/new", name="bibliotheque_primeanciennetevaleur_create")
    */

    public function addbibliothequeprimeanciennetevaleur(Request $request,BibliothequeccnRepository $repobibliothequeccn,$idbibliothequeccn,BibliothequeprimeanciennetepopulationRepository $repobibliothequeprimeanciennete,$idprimeanciennetepopulation)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $bibliothequeccn = $repobibliothequeccn->find($idbibliothequeccn);
        $bibliothequeprimeanciennete = $repobibliothequeprimeanciennete->find($idprimeanciennetepopulation);

        $bibliothequeprimeanciennetevaleur = new Bibliothequeprimeanciennetevaleur();

        $form = $this->createForm(BibliothequeprimeanciennetevaleurType::class,$bibliothequeprimeanciennetevaleur);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $bibliothequeprimeanciennete->addYe($bibliothequeprimeanciennetevaleur);
            $entityManager->persist($bibliothequeprimeanciennetevaleur);
            $entityManager->flush();

            return $this->redirectToRoute('bibliotheque_primeanciennetevaleur_create', ['idbibliothequeccn'=>$bibliothequeccn->getId(),'idprimeanciennetepopulation'=>$bibliothequeprimeanciennete->getId()]);
        }

        return $this->render('bibliothequeccn/bibliothequeprimeanciennetevaleur.html.twig', [
            'bibliothequeccn'=>$bibliothequeccn,
            'formPrimeanciennetevaleur'=>$form->createView()
        ]);
    }
    /**
     * @Route("/bibliothequeccn/{idbibliothequeccn}/smcpopulation/new", name="bibliotheque_smcpopulation_create")
    */

    public function addbibliothequesmcpopulation(Request $request,BibliothequeccnRepository $repobibliothequeccn,$idbibliothequeccn)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $bibliothequeccn = $repobibliothequeccn->find($idbibliothequeccn);

        $bibliothequesmcpopulation = new Bibliothequesmcpopulation();

        $form = $this->createForm(BibliothequesmcpopulationType::class,$bibliothequesmcpopulation);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $bibliothequeccn->addBibliothequesmcpopulation($bibliothequesmcpopulation);
            $entityManager->persist($bibliothequesmcpopulation);
            $entityManager->flush();

            return $this->redirectToRoute('bibliotheque_smcvaleur_create', ['idbibliothequeccn'=>$bibliothequeccn->getId(),'idsmcpopulation'=>$bibliothequesmcpopulation->getId()]);
        }

        return $this->render('bibliothequeccn/smcpopulation_create.html.twig', [
            'bibliothequeccn'=>$bibliothequeccn,
            'formSmcpopulation'=>$form->createView()
        ]);
    }

    /**
     * @Route("/bibliothequeccn/{idbibliothequeccn}/smcpopulation/{idsmcpopulation}/smcvaleur/new", name="bibliotheque_smcvaleur_create")
    */

    public function addbibliothequesmcvaleur(Request $request,BibliothequeccnRepository $repobibliothequeccn,$idbibliothequeccn,BibliothequesmcpopulationRepository $repobibliothequesmcpopulation,$idsmcpopulation)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $bibliothequeccn = $repobibliothequeccn->find($idbibliothequeccn);
        $bibliothequesmcpopulation = $repobibliothequesmcpopulation ->find($idsmcpopulation);

        $bibliothequesmcvaleur = new Bibliothequesmcvaleur;

        $form = $this->createForm(BibliothequesmcvaleurType::class,$bibliothequesmcvaleur);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $bibliothequesmcpopulation->addBibliothequesmcvaleur($bibliothequesmcvaleur);
            $entityManager->persist($bibliothequesmcvaleur);
            $entityManager->flush();

            return $this->redirectToRoute('bibliotheque_smcvaleur_create', ['idbibliothequeccn'=>$bibliothequeccn->getId(),'idsmcpopulation'=>$bibliothequesmcpopulation->getId()]);
        }

        return $this->render('bibliothequeccn/smcvaleur_create.html.twig', [
            'bibliothequeccn'=>$bibliothequeccn,
            'formSmcvaleur'=>$form->createView()
        ]);
    }
    /**
     * @Route("/bibliothequeccn/proposerccn", name="bibliotheque_proposerccn_show")
    */

    public function showproposerccn(UtilisateurRepository $repoutilisateur){
       
        $utilisateur=$this->getUser()->getUsername();
        $utilisteuractif=$repoutilisateur->findOneBy(['email'=>$utilisateur]);

        return $this->render('bibliothequeccn/bibliothequeproposerccn_show.html.twig', [
            'utilisateur'=>$utilisteuractif,
            'controller_name' => 'BibliothequeccnController',
        ]);

    }

    /**
     * @Route("/bibliothequeccn/proposerccn/{idccnprojet}/show", name="bibliotheque_ccnprojet_show")
    */
    public function showccnprojet(ConventioncollectiveRepository $repoconventioncollective, $idccnprojet){
       
        $ccnprojet=$repoconventioncollective->find($idccnprojet);

        return $this->render('bibliothequeccn/ccnprojet_show.html.twig', [
            'ccnprojet'=>$ccnprojet,
            'controller_name' => 'showccnprojet',
        ]);

    }
   
    /**
     * @Route("/bibliothequeccn/proposerccn/{idccnprojet}/import", name="bibliotheque_ccnprojet_import")
    */
    public function importccnprojet(Request $request, ConventioncollectiveRepository $repoconventioncollective, $idccnprojet,BibliothequeccnRepository $repobibliothequeccn){
        
        $entityManager = $this->getDoctrine()->getManager();

        $ccnprojet=$repoconventioncollective->find($idccnprojet);

        $ccnbibliotheque = $repobibliothequeccn->findOneBy(['idcc'=>$ccnprojet->getIdcc()]);//on recherche si la convention collective existe déjà dans la bibliotheque

        if (empty($ccnbibliotheque))  {//si la CCN n'existe pas dans la bibliotheque alors on peut ajouter
            $ccnbibliotheque = new Bibliothequeccn();

            $ccnbibliotheque->setIdcc($ccnprojet->getIdcc());
            $ccnbibliotheque->setLibelle($ccnprojet->getLibelle());
            $ccnbibliotheque->setStatut('En attente');
            $entityManager->persist($ccnbibliotheque);
            foreach ($ccnprojet->getClassifications() as $classifications){

                $classificationbibliotheque = new Bibliothequeclassification();
                $classificationbibliotheque->setType($classifications->getType());
                $classificationbibliotheque->setValeur($classifications->getValeur());
                $classificationbibliotheque->setStatut('En attente');
                $ccnbibliotheque->addBibliothequeclassification($classificationbibliotheque);
                $entityManager->persist($classificationbibliotheque);
                $entityManager->flush();
               

            }

            foreach ($ccnprojet->getPrimeanciennetepopulations() as $populationprimeanciennete){
                
                //$populationprimeanciennete est un objet de la class Primeanciennetepopulation

                $primeanciennetebibliotheque = new Bibliothequeprimeanciennetepopulation();
                $primeanciennetebibliotheque->setLibelle($populationprimeanciennete->getLibelle());
                $primeanciennetebibliotheque->setEtendu('1');
                //$primeanciennetebibliotheque->setStatut('En attente');
                $ccnbibliotheque->addBibliothequeprimeanciennetepopulation($primeanciennetebibliotheque);
                $entityManager->persist($primeanciennetebibliotheque);
                $entityManager->flush();
                
                // on ajoute les valeurs de la prime d'ancienneté
                foreach ($populationprimeanciennete->getPrimeanciennetevaleurs() as $valeurprimeanciennete){

                    //$valeurprimeanciennetebibliotheque est un objet de la class Primeanciennetevaleur

                    $valeurprimeanciennetebibliotheque = new Bibliothequeprimeanciennetevaleur();
                    $valeurprimeanciennetebibliotheque->setAnciennetemois($valeurprimeanciennete->getAnciennetemois());
                    $valeurprimeanciennetebibliotheque->setPourcentage($valeurprimeanciennete->getPourcentage());
                    $valeurprimeanciennetebibliotheque->setSigne($valeurprimeanciennete->getSigne());
                    $valeurprimeanciennetebibliotheque->setEtendu('1');
                    $primeanciennetebibliotheque->addBibliothequeprimeanciennetevaleur($valeurprimeanciennetebibliotheque);
                    $entityManager->persist($valeurprimeanciennetebibliotheque);
                    $entityManager->flush();
           
                } 
            }

            return $this->redirectToRoute('bibliothequeccn');
        }

        else {//on affiche un message

            return $this->render('bibliothequeccn/bibliothequeccnimport_echec.html.twig', [
                'ccn'=>$ccnbibliotheque,
                'controller_name' => 'echecccnprojet',
            ]);
        }

    }
    /**
     * @Route("/annuaire/organisme/new", name="annuaireorganisme_create")
    */

    public function addannuaireorganisme(Request $request){

        $entityManager = $this->getDoctrine()->getManager();

        $organisme = new Annuaireorganisme();

        $form = $this->createForm(AnnuaireorganismeType::class, $organisme);

        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()){
                    
            $entityManager->persist($organisme);
            
            $entityManager->flush();

            return $this->redirectToRoute('annuaireorganisme_create', []);
        }
        return $this->render('bibliothequeccn/annuaireorganisme_create.html.twig',[
            'controller_name' => 'bibliotheque_add_annuaire_organisme',
            'formAnnuaireorganisme'=>$form->createView()

        ]);

    }
    /**
     * @Route("/bibliothequeccn/proposerccn/{idbibliothequeccn}/demande/ancienid/{ancienid}/ancienvaleur/{ancienvaleur}/new", name="bibliotheque_demande_create")
    */
    public function adddemandemodification(Request $request,BibliothequeccnRepository $repobibliothequeccn,$idbibliothequeccn,$ancienid,$ancienvaleur){
        $entityManager = $this->getDoctrine()->getManager();
        $bibliothequeccn = $repobibliothequeccn->find($idbibliothequeccn);

        $bibliothequemodificationnew= new Bibliothequemodification ($ancienid,$ancienvaleur);
        
        $form = $this->createForm(BibliothequemodificationType::class, $bibliothequemodificationnew);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $bibliothequeccn->addBibliothequemodification($bibliothequemodificationnew);
            $entityManager->persist($bibliothequemodificationnew);            
            $entityManager->flush();
            return $this->redirectToRoute('bibliothequeccn_show', ['idbibliothequeccn'=>$bibliothequeccn->getId()]);

        }
        return $this->render('bibliothequeccn/modification_create.html.twig',[
            'controller_name' => 'bibliotheque_add_modification',
            'formBibliothquemodification'=>$form->createView()
            ]);
        }
}
