<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Societe;
use App\Entity\Projet;
use App\Entity\Etablissement;
use App\Entity\Banque;
use App\Entity\Conventioncollective;
use App\Entity\Bibliothequeccn;
use App\Entity\Classification;
use App\Entity\Bibliothequeclassification;
use App\Entity\Emploi;
use App\Entity\Axe;
use App\Entity\Section;
use App\Entity\Calendrier;
use App\Entity\Horaire;
use App\Entity\Primeanciennetepopulation;
use App\Entity\Primeanciennetevaleur;
use App\Entity\Congepaye;
use App\Entity\Tauxat;


use App\Repository\ProjetRepository;
use App\Repository\SocieteRepository;
use App\Repository\OrganismeRepository;
use App\Repository\EtablissementRepository;
use App\Repository\BanqueRepository;
use App\Repository\ConventioncollectiveRepository;
use App\Repository\BibliothequeccnRepository;
use App\Repository\ClassificationRepository;
use App\Repository\EmploiRepository;
use App\Repository\BibliothequeclassificationRepository;
use App\Repository\AxeRepository;
use App\Repository\CalendrierRepository;
use App\Repository\HoraireRepository;
use App\Repository\PrimeanciennetepopulationRepository;

use App\Form\SocieteType;
use App\Form\EtablissementType;
use App\Form\BanqueType;
use App\Form\ConventionType;
use App\Form\ClassificationType;
use App\Form\EmploiType;
use App\Form\AxeType;
use App\Form\SectionType;
use App\Form\CalendrierType;
use App\Form\HoraireType;
use App\Form\PrimeanciennetepopulationType;
use App\Form\PrimeanciennetevaleurType;
use App\Form\CongespayesType;
use App\Form\TauxatType;



class AssistantcreationsocieteController extends AbstractController
{
    
    
    /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/new", name="assistantcreationsociete_societe_create")
    */
    public function addsociete(Request $request,ProjetRepository $repo,$idprojet){
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repo->find($idprojet);

        $societe= new Societe();
       
        $form = $this->createForm(SocieteType::class,$societe);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $projet->addSociete($societe);
            $entityManager->persist($societe);
            $entityManager->flush();

            return $this->redirectToRoute('assistantcreationsociete_index', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId()]);
        }
        return $this->render('assistantcreationsociete/societe_create.html.twig',[
            'formSociete'=>$form->createView(),
            'controller_name' => 'Assistant_créer_société',

        ]);

    }

     /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/index", name="assistantcreationsociete_index")
     */
    public function index(Request $request,ProjetRepository $repo,$idprojet,SocieteRepository $reposociete,$idsociete){
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repo->find($idprojet);
        $societe = $reposociete->find($idsociete);

        return $this->render('assistantcreationsociete/index.html.twig',[
            
            'projet'=>$projet,
            'societe'=>$societe,
            'controller_name' => 'Assistant_index',

        ]);

    }

     /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/index/chapitreccn", name="assistantcreationsociete_chapitreccn")
     */
    public function chapitreccn(Request $request,ProjetRepository $repo,$idprojet,SocieteRepository $reposociete,$idsociete){
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repo->find($idprojet);
        $societe = $reposociete->find($idsociete);

        return $this->render('assistantcreationsociete/chapitreccn.html.twig',[
            
            'projet'=>$projet,
            'societe'=>$societe,
            'controller_name' => 'Assistant_chapitre_ccn',

        ]);

    }
     /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/ccn/new", name="assistantcreationsociete_ccn_create")
     */

     public function addccn(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete,BibliothequeccnRepository $repobibliothequeccn, BibliothequeclassificationRepository $repobibliothequeclassification){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);

        $ccn= new Conventioncollective;
        
        $form = $this->createForm(ConventionType::class,$ccn);

        $form->handleRequest($request);
       
        if($form->isSubmitted() && $form->isValid()){
            
            $societe->addConventioncollective($ccn);
            $entityManager->persist($ccn);
            $bibliothequeccn=new Bibliothequeccn;
            $bibliothequeccn = $repobibliothequeccn->findOneBy(['idcc'=>$ccn->getIdcc(),'statut'=>'Production']);

                      
            if (empty($bibliothequeccn))  {//si la CCN n'existe pas dans la bibliotheque l'utilisateur devra créer les éléments
                $message=0;
                $ccn->setOrigine('Projet');
                $entityManager->flush();

                return $this->redirectToRoute('assistantcreationsociete_add_classification', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idccn'=>$ccn->getId()]);

            }
            else {//sinon on importe les classifications depuis la bibliotheque
                
                $message=1;
                $ccn->setOrigine('Bibliotheque');
                $entityManager->flush();
                                          
                return $this->redirectToRoute('assistantcreationsociete_ccn_import', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idccn'=>$ccn->getId(),'idccnbibliotheque'=>$bibliothequeccn->getId()]);
            } 


        }
        return $this->render('assistantcreationsociete/convention_create.html.twig',[
            'societe'=>$societe,
            'projet'=>$projet,
            'formCcn'=>$form->createView(),
            'controller_name' => 'Assistant_créer_ccn',

        ]);    
    }


     /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/ccn/{idccn}/ccninterne/{idccnbibliotheque}", name="assistantcreationsociete_ccn_import")
     */

    public function importccn (Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete,ConventioncollectiveRepository $repoccn,$idccn,BibliothequeccnRepository $repobibliothequeccn,$idccnbibliotheque,BibliothequeclassificationRepository $repoclassif){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);
        $ccnprojet = $repoccn->find($idccn);
        $bibliothequeccn = $repobibliothequeccn->find($idccnbibliotheque);
       
        foreach($bibliothequeccn->getBibliothequeclassifications() as $classificationcegid){

            $classification = new Classification;
            
            $classification->setType($classificationcegid->getType());
            $classification->setValeur($classificationcegid->getValeur());
            $ccnprojet->addClassification($classification);
            $entityManager->persist($classification);
            $entityManager->flush();

        }


        foreach($bibliothequeccn->getBibliothequeprimeanciennetepopulations() as $primeanciennetepopulationcegid){

            $primeanciennetepopulation = new Primeanciennetepopulation;

            $primeanciennetepopulation->setLibelle($primeanciennetepopulationcegid->getLibelle());
            $primeanciennetepopulation->setEtendu($primeanciennetepopulationcegid->getEtendu());
            $ccnprojet->addPrimeanciennetepopulation($primeanciennetepopulation);
            $entityManager->persist($primeanciennetepopulation);
            $entityManager->flush();
            
            foreach($primeanciennetepopulationcegid->getBibliothequeprimeanciennetevaleur() as $primeanciennetevaleurcegid){

                $primeanciennetevaleur = new Primeanciennetevaleur;
    
                $primeanciennetevaleur->setAnciennetemois($primeanciennetevaleurcegid->getAnciennetemois());
                $primeanciennetevaleur->setPourcentage($primeanciennetevaleurcegid->getPourcentage());
                $primeanciennetevaleur->setSigne($primeanciennetevaleurcegid->getSigne());
                $primeanciennetevaleur->setEtendu($primeanciennetevaleurcegid->getEtendu());
                //ajouter un si etendu et que société étendu alors on lance l'import

                $primeanciennetepopulation->addPrimeanciennetevaleur($primeanciennetevaleur);
                $entityManager->persist($primeanciennetevaleur);
                $entityManager->flush();
    
            }
    

        }

       


        return $this->redirectToRoute('assistantcreationsociete_show_ccn', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idccn'=>$ccnprojet->getId()]);

       
    }


    /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/ccn/{idccn}", name="assistantcreationsociete_show_ccn")
     */

     public function showccn (Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete,ConventioncollectiveRepository $repoccn,$idccn){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);
        $ccnprojet = $repoccn->find($idccn);

        return $this->render('assistantcreationsociete/show_ccn.html.twig',[
            'societe'=>$societe,
            'projet'=>$projet,
            'ccnprojet'=>$ccnprojet,
            'controller_name' => 'Assistant_show_ccn',

        ]);    
    }

    /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/ccn/{idccn}/classification/new", name="assistantcreationsociete_add_classification")
    */

    public function addclassification (Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete,ConventioncollectiveRepository $repoccn,$idccn){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);
        $ccn = $repoccn->find($idccn);
       
        $classification = new Classification;

        $form = $this->createForm(ClassificationType::class,$classification);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $ccn->addClassification($classification);
            $entityManager->persist($classification);
            $entityManager->flush();

            return $this->redirectToRoute('assistantcreationsociete_add_classification', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idccn'=>$ccn->getId()]);
        }
        return $this->render('assistantcreationsociete/classification_create.html.twig',[
            'societe'=>$societe,
            'projet'=>$projet,
            'ccn'=>$ccn,
            'formClassification'=>$form->createView(),
            'controller_name' => 'Assistant_créer_classifications'

        ]);    
    }

    /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/ccn/{idccn}/primeanciennetepopulation/new", name="assistantcreationsociete_primeanciennetepopulation_create")
    */

    public function addprimeanciennetepopulation (Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete,ConventioncollectiveRepository $repoccn,$idccn){
        
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);
        $ccn = $repoccn->find($idccn);
        
        $primeanciennetepopulation = new Primeanciennetepopulation;

        $form = $this->createForm(PrimeanciennetepopulationType::class,$primeanciennetepopulation);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $primeanciennetepopulation->setEtendu($societe->getEtendu());
            $ccn->addPrimeanciennetepopulation($primeanciennetepopulation);
            $entityManager->persist($primeanciennetepopulation);
            $entityManager->flush();

            return $this->redirectToRoute('assistantcreationsociete_primeanciennetevaleur_create', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idccn'=>$ccn->getId(),'idprimeanciennetepopulation'=>$primeanciennetepopulation->getId()]);
        }
        return $this->render('assistantcreationsociete/primeanciennetepopulation_create.html.twig',[
            'societe'=>$societe,
            'projet'=>$projet,
            'ccn'=>$ccn,
            'formPrimeanciennetepopulation'=>$form->createView(),
            'controller_name' => 'Assistant_créer_populationprimeanciennete'

        ]);    
    }

    /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/ccn/{idccn}/primeanciennetepopulation/{idprimeanciennetepopulation}/valeur/new", name="assistantcreationsociete_primeanciennetevaleur_create")
    */
 
    public function addprimeanciennetevaleur (Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete,ConventioncollectiveRepository $repoccn,$idccn,PrimeanciennetepopulationRepository $repoprimeanciennetepopulation,$idprimeanciennetepopulation){
        
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);
        $ccn = $repoccn->find($idccn);
        $primeanciennetepopulation=$repoprimeanciennetepopulation->find($idprimeanciennetepopulation);

        $primeanciennetevaleur = new Primeanciennetevaleur;

        $form = $this->createForm(PrimeanciennetevaleurType::class,$primeanciennetevaleur);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $primeanciennetevaleur->setEtendu($societe->getEtendu());
            $primeanciennetepopulation->addPrimeanciennetevaleur($primeanciennetevaleur);
            $entityManager->persist($primeanciennetevaleur);
            $entityManager->flush();

            return $this->redirectToRoute('assistantcreationsociete_primeanciennetevaleur_create', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idccn'=>$ccn->getId(),'idprimeanciennetepopulation'=>$primeanciennetepopulation->getId()]);
        }
        return $this->render('assistantcreationsociete/primeanciennetevaleur_create.html.twig',[
            'societe'=>$societe,
            'projet'=>$projet,
            'ccn'=>$ccn,
            'population'=>$primeanciennetepopulation,
            'formPrimeanciennetevaleur'=>$form->createView(),
            'controller_name' => 'Assistant_créer_valeurprimeanciennete'

        ]);    
    }
  
     /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/libellemploi/new", name="assistantcreationsociete_emploi_create")
     */

     public function addlibelleemploi(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);

        $emploi=new Emploi;

        $form = $this->createForm(EmploiType::class,$emploi);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $societe->addEmploi($emploi);
            $entityManager->persist($emploi);
            $entityManager->flush();

            return $this->redirectToRoute('assistantcreationsociete_emploi_create', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idemploi'=>$emploi->getId()]);
        }
        return $this->render('assistantcreationsociete/emploi_create.html.twig',[
            'societe'=>$societe,
            'projet'=>$projet,
            'formEmploi'=>$form->createView(),
            'controller_name' => 'Assistant_add_emploi'

        ]);    

     }


     /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/libellemploi/show", name="assistantcreationsociete_emploi_show")
     */
    public function showlibelleemploi(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete, EmploiRepository $repoemploi){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);

     
        return $this->render('assistantcreationsociete/show_emploi.html.twig',[
            'societe'=>$societe,
            'projet'=>$projet,
            'controller_name' => 'Assistant_voir_emploi'

        ]);    

     }

     /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/etablissement/new", name="assistantcreationsociete_etablissement_create")
     */

    public function addetablissement(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);

        $etablissement= new Etablissement;
        
        $form = $this->createForm(EtablissementType::class,$etablissement);

        $form->handleRequest($request);
       
        if($form->isSubmitted() && $form->isValid()){
            
            $etablissement->setSiren($societe->getSiren());
            $societe->addEtablissement($etablissement);
            $entityManager->persist($etablissement);
            $entityManager->flush();

            return $this->redirectToRoute('assistantcreationsociete_congespayes_create', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idetablissement'=>$etablissement->getId()]);
        }
        return $this->render('assistantcreationsociete/etablissement_create.html.twig',[
            'societe'=>$societe,
            'projet'=>$projet,
            'formEtablissement'=>$form->createView(),
            'controller_name' => 'Assistant_add_etablissement'

        ]);    
    }

    /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/etablissement/{idetablissement}/congespayes", name="assistantcreationsociete_congespayes_create")
    */
    public function addcongespayes(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete,EtablissementRepository $repoetablissement,$idetablissement){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);
        $etablissement= $repoetablissement->find($idetablissement);

        $congespayes = new Congepaye();
        
        $form = $this->createForm(CongespayesType::class,$congespayes);

        $form->handleRequest($request);
       
        if($form->isSubmitted() && $form->isValid()){
            
            $etablissement->addCongepaye($congespayes);
            $entityManager->persist($congespayes);
            $entityManager->flush();

            return $this->redirectToRoute('assistantcreationsociete_organisme', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idetablissement'=>$etablissement->getId(),'nature'=>'URSSAF']);
        }
        return $this->render('assistantcreationsociete/congespayes_create.html.twig',[
            'societe'=>$societe,
            'projet'=>$projet,
            'etablissement'=>$etablissement,
            'formCongespayes'=>$form->createView(),
            'controller_name' => 'Assistant_add_cp'

        ]);  

    }


    /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/etablissement/{idetablissement}/{nature}/new", name="assistantcreationsociete_organisme")
    */

     public function showannuaireorganisme(ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete,OrganismeRepository $repoorganisme,EtablissementRepository $repoetablissement,$idetablissement,$nature){
        
        $entityManager = $this->getDoctrine()->getManager();

        $annuaireorganismes=$repoorganisme->findBy(['nature'=>$nature]);
        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);
        $etablissement = $repoetablissement->find($idetablissement);

        return $this->render('assistantcreationsociete/listeorganismes.html.twig', [
            'controller_name' => 'ProjetController',
            'annuaireorganismes'=>$annuaireorganismes,
            'societe'=>$societe,
            'projet'=>$projet,
            'etablissement'=>$etablissement,
            'nature'=>$nature,
            'controller_name' => 'Assistant_add_organisme'

        ]);
     }

    /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/etablissement/{idetablissement}/organisme/{idorganisme}/affecterorganisme/{nature}", name="assistantcreationsociete_organisme_create")
     */

     public function affecterorganisme(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete,OrganismeRepository $repoorganisme,$idorganisme,EtablissementRepository $repoetablissement,$idetablissement,$nature){
       
        $entityManager = $this->getDoctrine()->getManager();

        $organisme=$repoorganisme->find($idorganisme);
        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);
        $etablissement = $repoetablissement->find($idetablissement);

        $organisme->addEtablissement($etablissement);
        $entityManager->persist($organisme);
        $entityManager->persist($etablissement);

        $entityManager->flush();

        if ($organisme->getnature()=="Mutuelle"){
            return $this->redirectToRoute('assistantcreationsociete_banque_create', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idetablissement' =>$etablissement->getId()]);

        }
        else{
            return $this->redirectToRoute('assistantcreationsociete_organisme', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idetablissement'=>$etablissement->getId(),'nature'=>$nature]);
        }
     }

    /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/etablissement/{idetablissement}/banque/new", name="assistantcreationsociete_banque_create")
    */

    public function addbanque(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete, EtablissementRepository $repoetablissement,$idetablissement){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);
        $etablissement = $repoetablissement->find($idetablissement);


        $banque= new Banque;
        
        $form = $this->createForm(BanqueType::class,$banque);

        $form->handleRequest($request);
       
        if($form->isSubmitted() && $form->isValid()){
            
            $etablissement->addBanque($banque);
            $entityManager->persist($banque);
            $entityManager->flush();

            return $this->redirectToRoute('assistantcreationsociete_banque_create', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idetablissement' =>$etablissement->getId()]);
        }
        return $this->render('assistantcreationsociete/banque_create.html.twig',[
            'societe'=>$societe,
            'projet'=>$projet,
            'etablissement'=>$etablissement,
            'formBanque'=>$form->createView(),
            'controller_name' => 'Assistant_add_banque'

        ]);    
    }

    /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/analytique/axe/new", name="assistantcreationsociete_axe_create")
    */
    public function addanalytique(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);

        $axe = new Axe;

        $form = $this->createForm(AxeType::class,$axe);

        $form->handleRequest($request);
     
        if($form->isSubmitted() && $form->isValid()){
            
            $societe->addAxe($axe);
            $entityManager->persist($axe);
            $entityManager->flush();
            return $this->redirectToRoute('assistantcreationsociete_section_create', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idaxe'=>$axe->getId()]);

        }
        return $this->render('assistantcreationsociete/axe_create.html.twig',[
            'societe'=>$societe,
            'projet'=>$projet,
            'formAxe'=>$form->createView(),
            'controller_name' => 'Assistant_add_axe'

        ]);

    }

   /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/analytique/axe/{idaxe}", name="assistantcreationsociete_section_create")
   */
    public function addsection(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete, AxeRepository $repoaxe,$idaxe){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);
        $axe=$repoaxe->find($idaxe);
        $section = new Section;

        $form = $this->createForm(SectionType::class,$section);

        $form->handleRequest($request);
    
        if($form->isSubmitted() && $form->isValid()){
            
            $axe->addSection($section);
            $entityManager->persist($section);
            $entityManager->flush();
            return $this->redirectToRoute('assistantcreationsociete_section_create', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idaxe'=>$axe->getId()]);

        }
        return $this->render('assistantcreationsociete/section_create.html.twig',[
            'societe'=>$societe,
            'projet'=>$projet,
            'axe'=>$axe,
            'formSection'=>$form->createView(),
            'controller_name' => 'Assistant_add_section'

        ]);

    }

    /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/calendrier/new", name="assistantcreationsociete_calendrier_create")
    */

    public function addcalendrier(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);
        $calendrier = new Calendrier;
    
        $form = $this->createForm(CalendrierType::class,$calendrier);
    
        $form->handleRequest($request);     

        if($form->isSubmitted() && $form->isValid()){
            
            $societe->addCalendrier($calendrier);
            $entityManager->persist($calendrier);
            $entityManager->flush();
            return $this->redirectToRoute('assistantcreationsociete_horaire_create', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idcalendrier'=>$calendrier->getId()]);

        }
        return $this->render('assistantcreationsociete/calendrier_create.html.twig',[
            'societe'=>$societe,
            'projet'=>$projet,
            'form'=>$form->createView(),
            'controller_name' => 'Assistant_créer_calendrier'

        ]);


    }
    /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/calendrier/{idcalendrier}/horaire/new", name="assistantcreationsociete_horaire_create")
    */

    public function addhoraire(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete,CalendrierRepository $repocalendrier,$idcalendrier){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);
        $calendrier = $repocalendrier->find($idcalendrier);

        $horaire= new Horaire;
    
        $form = $this->createForm(HoraireType::class,$horaire);
    
        $form->handleRequest($request);     

        if($form->isSubmitted() && $form->isValid()){
            
            $calendrier->addHoraire($horaire);
            $entityManager->persist($horaire);
            $entityManager->flush();
            return $this->redirectToRoute('assistantcreationsociete_horaire_create', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idcalendrier'=>$calendrier->getId()]);

        }
        return $this->render('assistantcreationsociete/horaire_create.html.twig',[
            'societe'=>$societe,
            'projet'=>$projet,
            'calendrier'=>$calendrier,
            'formHoraire'=>$form->createView(),
            'controller_name' => 'Assistant_créer_horaire'

        ]);


    }

    /**
     * @Route("/projet/{idprojet}/assistantcreationsociete/societe/{idsociete}/etablissement/{idetablissement}/taux/new", name="assistantcreationsociete_taux_create")
    */

    public function addtauxat(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete, EtablissementRepository $repoetablissement,$idetablissement){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);
        $etablissement = $repoetablissement->find($idetablissement);


        $tauxat= new Tauxat;
        
        $form = $this->createForm(TauxatType::class,$tauxat);

        $form->handleRequest($request);
       
        if($form->isSubmitted() && $form->isValid()){
            
            $etablissement->addTauxat($tauxat);
            $entityManager->persist($tauxat);
            $entityManager->flush();

            return $this->redirectToRoute('assistantcreationsociete_taux_create', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idetablissement' =>$etablissement->getId()]);
        }
        return $this->render('assistantcreationsociete/tauxat_create.html.twig',[
            'societe'=>$societe,
            'projet'=>$projet,
            'etablissement'=>$etablissement,
            'formTauxat'=>$form->createView(),
            'controller_name' => 'Assistant_add_tauxat'

        ]);    
    }

    /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/ccn/{idccn}/classification/{idclassification}", name="assistantcreationsociete_remove_classification")
    */

    public function removeclassification (Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete,ConventioncollectiveRepository $repoccn,$idccn,ClassificationRepository $repoclassification,$idclassification){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);
        $ccn = $repoccn->find($idccn);    
        $classification = $repoclassification->find($idclassification);
        $ccn->removeClassification($classification);
        $entityManager->persist($classification);
        $entityManager->flush();

        return $this->redirectToRoute('assistantcreationsociete_show_ccn', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idccn'=>$ccn->getId()]);
        }

    /**
     * @Route("/assistantcreationsociete/projet/{idprojet}/societe/{idsociete}/ccn/{idccn}/classification/{idclassification}", name="assistantcreationsociete_edit_classification")
    */

    public function editclassification (Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete,ConventioncollectiveRepository $repoccn,$idccn,ClassificationRepository $repoclassification,$idclassification){

        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe = $reposociete->find($idsociete);
        $ccn = $repoccn->find($idccn);    
        $classification = $repoclassification->find($idclassification);
        
        $ccn->removeClassification($classification);
        $entityManager->persist($classification);
        $entityManager->flush();

        return $this->redirectToRoute('assistantcreationsociete_show_ccn', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idccn'=>$ccn->getId()]);
        }

     
}
