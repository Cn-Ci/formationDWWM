<?php
/**********************************************************************************
****************************SERVICE*******CONTROLLER*******************************
***********************************************************************************/


namespace App\Controller;

use App\Entity\Produit;
use App\Service\ProduitService;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    /**
     * @Route("/produit")
     */
class ProduitController extends AbstractController
{
    /**
    * @Route("/", name="tableau_produit")
    */
    public function tableau(ProduitService $service): Response
    {
        $produits = $service->tabProduit();
        return $this->render('produit/tableau.html.twig', [
            'controller_name' => 'ProduitController',
            'produits' => $produits,
        ]);
    }

    /**
    * @Route("/add", name="add_produit")
    */
    public function add(ProduitService $service, Request $request): Response
    {
        $prenom = 'cindy';
        $produit = $service->addProduit();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // $produit = $form->getData();
            // $manager = $this->getDoctrine()->getManager();
            $manager->persist($produit);
            $manager->flush();

           return $this->redirectToRoute("tableau_produit") ;
        }
        return $this->render('produit/add.html.twig', [
            'controller_name' => 'ProduitController',
            'title' => 'Bienvenue sur la page dajout',
            'prenom' => $prenom,
            'monform' => $form->createView()
        ]);
    } 

    /**
    * @Route("/edit", name="edit_produit")
    */
   public function edit(): Response
   {
       return $this->render('produit/edit.html.twig', [
           'controller_name' => 'ProduitController',
       ]);
   } 

    /**
     * @Route("/delete/{id}", name="delete_produit")
     */
    public function delete(Produit $produit, EntityManagerInterface $manager)
    {
        $manager->remove($produit);
        $manager->flush();

        return $this->redirectToRoute("tableau_produit") ; 
    }
    
     /** Permet d'afficher une seule annonce
     * 
     * @Route("/{designation}"), name ="produit_show"
     * 
     * @return Response
     */
    public function show($designation, ProduitRepository $repo) {
        // recupere l'annonce qui correspond au produit
        $produit = $repo->findOneByDesignation($designation);
        return $this->render('produit/show.html.twig', [ 
            'produit' => $produit
        ]);
    }
}

/**********************************************************************************
****************************COUCHE**********SERVICE********************************
***********************************************************************************/


namespace App\Service;

use App\Entity\Produit;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitService extends AbstractController {

    function tabProduit() 
    {
        $produit = $this->getDoctrine()->getRepository(Produit::class)->findAll();
        return $produit; 
    }

    function addProduit() 
    {
        $produit = new Produit();
        // $form = $this->createForm(ProduitType::class, $produit);
        $form = $this->createFormBuilder($produit)->add("designation")
        ->add("prix")
        ->add("couleur")
        ->add("save", SubmitType::Class, [ "label" => "Ajouter le produit"])
        ->getForm();
        
        return $form;   
    }

}

/**********************************************************************************
****************************SEUL**********CONTROLLER*******************************
***********************************************************************************/

<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    /**
     * @Route("/produit")
     */
class ProduitController extends AbstractController
{
    /**
    * @Route("/", name="tableau_produit")
    */
    public function tableau(ProduitRepository $repo): Response
    {
        //$repo = $this->getDoctrine()->getRepository(Produit::class);
        $produits = $repo->findAll();
        return $this->render('produit/tableau.html.twig', [
            'controller_name' => 'ProduitController',
            'produits' => $produits,
        ]);
    }

    /**
    * @Route("/add", name="add_produit")
    */
    public function add(Request $request, EntityManagerInterface $manager): Response
    {
        $produit = new Produit();
        // $form = $this->createForm(ProduitType::class, $produit);
        $form = $this->createFormBuilder($produit)->add("designation")
        ->add("prix")
        ->add("couleur")
        ->add("save", SubmitType::Class, [ "label" => "Ajouter le produit"])
        ->getForm();
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // $produit = $form->getData();
           // $manager = $this->getDoctrine()->getManager();
            $manager->persist($produit);
            $manager->flush();

           return $this->redirectToRoute("tableau_produit") ;
        }

        $prenom = 'cindy';
        return $this->render('produit/add.html.twig', [
            'controller_name' => 'ProduitController',
            'title' => 'Bienvenue sur la page dajout',
            'prenom' => $prenom,
            'monform' => $form->createView()
        ]);
    } 

    /**
    * @Route("/edit", name="edit_produit")
    */
   public function edit(): Response
   {
       return $this->render('produit/edit.html.twig', [
           'controller_name' => 'ProduitController',
       ]);
   } 

    /**
     * @Route("/delete/{id}", name="delete_produit")
     */
    public function delete(Produit $produit, EntityManagerInterface $manager): Response
    {
            $manager->remove($produit);
            $manager->flush();
            return $this->redirectToRoute('tableau_produit');
    }
    
     /** Permet d'afficher une seule annonce
     * 
     * @Route("/{designation}"), name ="produit_show"
     * 
     * @return Response
     */
    public function show($designation, ProduitRepository $repo) {
        // recupere l'annonce qui correspond au produit
        $produit = $repo->findOneByDesignation($designation);
        return $this->render('produit/show.html.twig', [ 
            'produit' => $produit
        ]);
    }
}
