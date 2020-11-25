<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use Symfony\Common\Persistence\ObjectManager;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\Utilisateur;
use App\Entity\Connexion;
use App\Form\RegistrationType;
use App\Repository\UtilisateurRepository;




class SecurityController extends AbstractController
{
    /**
     *  @Route("/inscription",name="security_registration")
     */
    
    public function registration(Request $request,UserPasswordEncoderInterface $encoder){
        $entityManager = $this->getDoctrine()->getManager();

        $utilisateur = new Utilisateur();

        $form = $this->createForm(RegistrationType::class, $utilisateur);

        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()){

            $hash = $encoder->encodePassword($utilisateur, $utilisateur->getPassword());
            
            $utilisateur->setPassword($hash);
            $utilisateur->setUsername($utilisateur->getEmail());//Username est un élément de l'interface UserInterface
            $entityManager->persist($utilisateur);
            $entityManager->flush();

            return $this->redirectToRoute('security_login');
        }
        return $this->render('security/registration.html.twig',[

            'form'=>$form->createView()
        ]);

    }

    /**
     * @Route ("/connexion",name="security_login")
     */

    public function login(){
        return $this->render('security/login.html.twig');

    }

    /**
     * @Route("/deconnexion",name="security_logout")
    */
    public function logout(){
       
    }
    /**
     * @Route("/registration/deconnexion",name="security_registrationlogout")
    */
    public function registrationlogout(UtilisateurRepository $repoutilisateur){
        $entityManager = $this->getDoctrine()->getManager();
        
        $utilisateur=$this->getUser()->getUsername();
        $utilisteuractif=$repoutilisateur->findOneBy(['email'=>$utilisateur]);

        $connexion = new Connexion;

        $connexion->setEtape('Deconnexion');
        $entityManager->persist($connexion);
        $utilisteuractif->addConnexion($connexion);
        $entityManager->flush();    

        return $this->redirectToRoute('security_logout');
 
    }

    /**
     * @Route("/registration/connexion/new",name="security_addconnexion")
    */

    public function addconnexion(UtilisateurRepository $repoutilisateur){
        
        $entityManager = $this->getDoctrine()->getManager();

        $utilisateur=$this->getUser()->getUsername();
        $utilisteuractif=$repoutilisateur->findOneBy(['email'=>$utilisateur]);

        $connexion = new Connexion;

        $connexion->setEtape('Connexion');
        $entityManager->persist($connexion);
        $utilisteuractif->addConnexion($connexion);
        $entityManager->flush();
   
        return $this->redirectToRoute('accueil');


    }
}
