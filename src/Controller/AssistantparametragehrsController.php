<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Societe;
use App\Entity\Projet;
use App\Entity\Zonelibrehrs;
use App\Entity\Valeurzonelibrehrs;
use App\Entity\Tauxabsence;
use App\Entity\Absence;
use App\Entity\Rubrique;

use App\Repository\ProjetRepository;
use App\Repository\SocieteRepository;
use App\Repository\ZonelibrehrsRepository;
use App\Repository\ValeurzonelibrehrsRepository;
use App\Repository\TauxabsenceRepository;

use App\Form\ZonelibrehrsType;
use App\Form\ValeurzonelibrehrsType;
use App\Form\TauxabsenceType;
use App\Form\AbsenceType;
use App\Form\RubriqueType;

class AssistantparametragehrsController extends AbstractController
{
    /**
     * @Route("projet/{idprojet}/assistantparametragehrs/societe/{idsociete}/zoneslibres", name="assistantparametragehrszoneslibres_create")
     */
    public function addzoneslibres(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe=$reposociete->find($idsociete);

        $zonelibrehrs = new Zonelibrehrs;
        
        $form = $this->createForm(ZonelibrehrsType::class,$zonelibrehrs);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $societe->addZonelibrehrs($zonelibrehrs);
            $entityManager->persist($zonelibrehrs);
            $entityManager->flush();

            return $this->redirectToRoute('assistantparametragehrszoneslibresvaleur_create', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idzonelibre'=>$zonelibrehrs->getId()]);
        }

        return $this->render('assistantparametragehrs/zonelibrehrs_create.html.twig', [
            'projet'=>$projet,
            'societe'=>$societe,
            'formZonelibrehrs'=>$form->createView(),
            'controller_name' => 'Créer une zone libre',
        ]);
    }
    /**
     * @Route("projet/{idprojet}/assistantparametragehrs/societe/{idsociete}/zoneslibres/{idzonelibre}/valeur/new", name="assistantparametragehrszoneslibresvaleur_create")
     */
    public function addzonelibrevaleur(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete,ZonelibrehrsRepository $repozonelibre, $idzonelibre)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe=$reposociete->find($idsociete);
        $zonelibrehrs=$repozonelibre->find($idzonelibre);
        
        $zonelibrevaleur = new Valeurzonelibrehrs;
        $form = $this->createForm(ValeurzonelibrehrsType::class,$zonelibrevaleur);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $zonelibrehrs->addValeurzonelibrehr($zonelibrevaleur);
            $entityManager->persist($zonelibrevaleur);
            $entityManager->flush();

            return $this->redirectToRoute('assistantparametragehrszoneslibresvaleur_create', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId(),'idzonelibre'=>$zonelibrehrs->getId()]);
        }

        return $this->render('assistantparametragehrs/zonelibrehrsvaleur_create.html.twig', [
            'projet'=>$projet,
            'societe'=>$societe,
            'zonelibre'=>$zonelibrehrs,
            'formZonelibrehrsvaleur'=>$form->createView(),
            'controller_name' => 'Création valeur zone libre',
        ]);
    }

    /**
     * @Route("projet/{idprojet}/assistantparametragehrs/societe/{idsociete}/tauxabsence", name="assistantparametragetauxabsence_create")
     */

    public function addtauxabsence(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe=$reposociete->find($idsociete);

        $tauxabsence = new Tauxabsence;
        
        $form = $this->createForm(TauxabsenceType::class,$tauxabsence);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $societe->addTauxabsence($tauxabsence);
            $entityManager->persist($tauxabsence);
            $entityManager->flush();

            return $this->redirectToRoute('assistantparametrageabsence_create', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId()]);
        }

        return $this->render('assistantparametragehrs/tauxabsence_create.html.twig', [
            'projet'=>$projet,
            'societe'=>$societe,
            'formTauxabsence'=>$form->createView(),
            'controller_name' => 'Créer un taux absence',
        ]);
    }

    /**
     * @Route("projet/{idprojet}/assistantparametragehrs/societe/{idsociete}/absence/new", name="assistantparametrageabsence_create")
     */

    public function addabsence(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe=$reposociete->find($idsociete);
       
        $absence = new Absence;

        $form = $this->createForm(AbsenceType::class,$absence);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $societe->addAbsence($absence);
            $entityManager->persist($absence);
            $entityManager->flush();

            return $this->redirectToRoute('assistantparametrageabsence_create', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId()]);
        }

        return $this->render('assistantparametragehrs/absence_create.html.twig', [
            'projet'=>$projet,
            'societe'=>$societe,
            'formAbsence'=>$form->createView(),
            'controller_name' => 'Créer une absence',
        ]);
    }

    /**
     * @Route("projet/{idprojet}/assistantparametragehrs/societe/{idsociete}/rubrique/new", name="assistantparametragerubrique_create")
     */

    public function addrubrique(Request $request,ProjetRepository $repoprojet,$idprojet,SocieteRepository $reposociete,$idsociete)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $projet = $repoprojet->find($idprojet);
        $societe=$reposociete->find($idsociete);
       
        $rubrique = new Rubrique;

        $form = $this->createForm(RubriqueType::class,$rubrique);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $societe->addRubrique($rubrique);
            $entityManager->persist($rubrique);
            $entityManager->flush();

            return $this->redirectToRoute('assistantparametragerubrique_create', ['idprojet' => $projet->getId(),'idsociete'=>$societe->getId()]);
        }

        return $this->render('assistantparametragehrs/rubrique_create.html.twig', [
            'projet'=>$projet,
            'societe'=>$societe,
            'formRubrique'=>$form->createView(),
            'controller_name' => 'Créer une rubrique',
        ]);
    }


}
