<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use Psr\Log\LoggerInterface;
use App\Service\ProduitService;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\Exception\ProduitException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

    /**
     * @Route("/produit")
     */
class ProduitController extends AbstractController
{
    /**
    * @Route("/", name="tableau_produit")
    */
    public function afficheProduits(ProduitService $service): Response
    {
        try {
        //$repo = $this->getDoctrine()->getRepository(Produit::class);
        //$produits = $repo->findAll();
        $produits = $service->searchAll();
        
        } catch (\ProduitException $e) {
            return $this->render('produit/tableau.html.twig', [
                'controller_name' => 'ProduitController',
                'produits' => [],
                'error' => $e->getMessage()
                ]);
        }
        return $this->render('produit/tableau.html.twig', [
            'controller_name' => 'ProduitController',
            'produits' => $produits,
        ]);
    }

    /**
    * @Route("/add", name="add_produit")
    */
    public function add(ProduitService $service, Request $request, LoggerInterface $logger): Response
    {
        try {
            $produit = new Produit();
            $form = $this->createForm(ProduitType::class, $produit);
            // $form = $this->createFormBuilder($produit)->add("designation")
            //  ->add("prix")
            //  ->add("couleur")
            //  ->add("save", SubmitType::Class, [ "label" => "Ajouter le produit"])
            //  ->getForm();
            
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
            //     // $produit = $form->getData();
            //    // $manager = $this->getDoctrine()->getManager();
            //     $manager->persist($produit);
            //     $manager->flush();
                $form = $service->add($produit);
                $logger->info('We are logging!');
                return $this->redirectToRoute("tableau_produit");
            }
        } catch (\ProduitException $ex) {
            return $this->render('produit/tableau.html.twig', [
                'controller_name' => 'ProduitController',
                'produits' => [],
                'error' => $e->getMessage(),
                ]);
        }
            $prenom = 'cindy';
            return $this->render('produit/add.html.twig', [
                'controller_name' => 'ProduitController',
                'title' => 'Ajout',
                'prenom' => $prenom,
                'monform' => $form->createView(),
                'btnTitle' => 'Ajouter un produit'
            ]);
    } 

    /**
    * @Route("/edit/{id}", name="edit_produit", methods={"GET","POST"})
    * 
    */
   public function edit(ProduitService $service, Produit $produit, Request $request): Response
   {
        try {
            $form = $this->createForm(ProduitType::class, $produit);
            
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
            //     // $produit = $form->getData();
            //    // $manager = $this->getDoctrine()->getManager();
            //  $manager->persist($produit);
            //  $manager->flush();
                $form = $service->update($produit);
                // $this->addFlash(
                //    'success',                                                                         
                //    "Le produit <strong>{$produit->getDesignation()}</strong> a bien été enregistré");
            }
                return $this->redirectToRoute("tableau_produit") ;
        } catch (\ProduitException $e) {
            return $this->render('produit/tableau.html.twig', [
                'controller_name' => 'ProduitController',
                'produits' => [],
                'error' => $e->getMessage(),
                ]);

        }
        $prenom = 'cindy';
            return $this->render('produit/edit.html.twig', [
                'controller_name' => 'ProduitController',
                'title' => 'Modification',
                'prenom' => $prenom,
                'produit' => $produit,
                'monform' => $form->createView(),
                'btnTitle' => 'Modifier le produit',
            ]);

   } 

    /**
     * @Route("/delete/{id}", name="delete_produit")
     */
    public function delete(Produit $produit, ProduitService $service): Response
    {
       try {
            // $manager->remove($produit);
            // $manager->flush();
            $id = $service->delete($produit);
            return $this->redirectToRoute('tableau_produit');
        } catch (\ProduitException $e) {
            $prenom = 'cindy';
            return $this->render('produit/tableau.html.twig', [
                'controller_name' => 'ProduitController',
                'error' => $e->getMessage(),
            ]);
        }
        return $this->render('produit/tableau.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }
    
     /** Permet d'afficher une seule annonce
     * 
     * @Route("/show/{id}", name ="show_produit")
     * 
     * @return Response
     */
    public function showOne(Produit $produit) {
        try {
            // recupere l'annonce qui correspond au produit
            // $produit = $repo->findOneById($id);

            return $this->render('produit/show.html.twig', [ 
                'controller_name' => 'ProduitController',
                'title' => 'Consultation',
                'produit' => $produit
            ]);
        } catch (\ProduitException $ex) {
            echo "Exception Found - " . $ex->getMessage() . "<br/>";
        }
    }
}
