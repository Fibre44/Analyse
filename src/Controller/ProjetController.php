<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Doctrine\ORM\EntityManager;
use App\Entity\Projet;
use App\Repository\ProjetRepository;
use App\Form\ProjetType;
use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use App\Form\RegistrationType;
 

class ProjetController extends AbstractController
{

    /**
     * @Route("/", name="racine")
     */


    public function racine()
    {
    return $this->redirectToRoute('projet_accueil');

    }
    /**
     * @Route("/accueil", name="projet_accueil")
     */
    public function index(ProjetRepository $repoprojet,UtilisateurRepository $repoutilisateur)
    {
        $entityManager = $this->getDoctrine()->getManager();
 
        $utilisateur=$this->getUser()->getUsername();
        $utilisteuractif=$repoutilisateur->findOneBy(['email'=>$utilisateur]);
      

        return $this->render('projet/index.html.twig', [
            'controller_name' => 'ProjetController',
            'utilisateur'=>$utilisteuractif,
        ]);
    }


    /**
     * @Route("/projet/new", name="projet_create")
     * @Route("/projet/{idprojet}/edit", name="projet_edit")
     */
    public function form(Projet $projet=null,Request $request, UtilisateurRepository $repoutilisateur){
        $entityManager = $this->getDoctrine()->getManager();
        
        $utilisateur=new Utilisateur();
        $utilisateur = $repoutilisateur->findby([
            'email'=>$this->getUser()->getUsername()]);//on récupére l'email pour fabriquer l'utilisateur
            
       $projet= new Projet();
                
        $form = $this->createForm(ProjetType::class,$projet);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if(!$projet->getId()){
            $projet->setCreateAt(new \DateTime());
            }
            foreach($utilisateur as $utilisateurs){
                $entityManager->persist($projet);//on fait persister le l'id projet
                $utilisateurs->addProjet($projet);//on ajoute le projet
                $entityManager->persist($utilisateurs);
                $projet->setCreateur($utilisateurs->getEmail());
                
            }

            $entityManager->flush();

            return $this->redirectToRoute('projet_addutilisateur', ['idprojet' => $projet->getId()]);
        }
        return $this->render('projet/create.html.twig',[
            'formProjet'=>$form->createView(),
            'editMode'=>$projet->getid()!==null,
            'controller_name' => 'Assistant_add_projet',


        ]);
    }

    /**
     * @Route("/projet/{idprojet}/utilisateur/new",name="projet_addutilisateur")
    */

    public function addutilisateurprojet (Request $request,UserPasswordEncoderInterface $encoder,ProjetRepository $repo,$idprojet){
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repo->find($idprojet);

        $utilisateur = new Utilisateur();

        $form = $this->createForm(RegistrationType::class, $utilisateur);

        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()){

            $hash = $encoder->encodePassword($utilisateur, $utilisateur->getPassword());
            
            $utilisateur->setPassword($hash);
            $utilisateur->setUsername($utilisateur->getEmail());//Username est un élément de l'interface UserInterface
            $entityManager->persist($utilisateur);
            $utilisateur->addProjet($projet);
            
            $entityManager->flush();

            return $this->redirectToRoute('projet_accueil', ['idprojet' => $projet->getId()]);
        }
        return $this->render('security/registration.html.twig',[

            'form'=>$form->createView(),
            'controller_name' => 'Assistant_add_projet_utilisateur',

        ]);

    }
    /**
     * @Route("/projet/{idprojet}/cahier_analyse/show",name="projet_analyse")
    */

    public function show(ProjetRepository $repo,$idprojet){

        $projet = $repo->find($idprojet);
        $societes = $projet->getSocietes();
        
        $totalsociete=0;
        $compteur=0;
        foreach ($societes as $totalitemsociete)//Si le nbre de projet est à 0 alors on affichera créer une société
        {
            $compteur=1+$compteur;
            $totalsociete=$compteur;
        }

        return $this->render('projet/cahier_analyse.html.twig',[
            'projet'=>$projet,
            'totalsociete'=>$totalsociete,
            'controller_name' => 'Cahier_analyse',

        ]);
    }
    /**
     * @Route("/projet/{idprojet}/assistantcreationsociete",name="projet_assistantcreationsociete")
    */


    public function assistantesociete(ProjetRepository $repo,$idprojet){

        $projet = $repo->find($idprojet);
        
        
        return $this->render('projet/assistantecreationsociete.html.twig',[
            'projet'=>$projet,
            'controller_name' => 'Assistant_creation',


        ]);
    }
  
    /**
     * @Route("/projet/{idprojet}/assistanteparametrage",name="projet_assistantcreationparametragehrs")
    */


    public function assistantecreationparametragehrs(ProjetRepository $repo,$idprojet){

        $projet = $repo->find($idprojet);
        $societes = $projet->getSocietes();
        
        $totalsociete=0;
        
        return $this->render('projet/assistantcreationparametragehrs.html.twig',[
            'projet'=>$projet,
            'societesprojet'=>$societes,
            'controller_name' => 'Assistant_paramétrage',

        ]);
    }
    /**
     * @Route("/projet/{idprojet}/tableaudebord",name="projet_tableau_de_bord")
    */
    public function projettableaudebord(ProjetRepository $repo,$idprojet){

        $projet = $repo->find($idprojet);
        
        
        return $this->render('projet/tableaudebord.html.twig',[
            'projet'=>$projet,
            'controller_name' => 'Tableau_de_bord',

        ]);
    }
}
