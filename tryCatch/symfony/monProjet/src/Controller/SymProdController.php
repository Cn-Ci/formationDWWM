<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Repository\AdRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class SymProdController extends AbstractController
{
    /**
    * @Route("/symprod", name="symprod")
    */
    public function symProd(): Response
    {
        return $this->render('symprod/symprod.html.twig', [
            'controller_name' => 'SymProdController',
        ]);
    }

    /**
    * @Route("/symprod/ads", name="symprod_ad")
    */
    public function symProdAd(AdRepository $repo): Response
    {
        // $repo = $this->getDoctrine()->getRepository(Ad::class);

        $ads = $repo->findAll();

        return $this->render('symprod/symprodAd.html.twig', [
            'ads' => $ads,
        ]);
    }

    /**
     * Permet d'afficher une seule annonce
     * 
     * @Route("/symprod/{slug}"), name ="symprod_show"
     * 
     * @return Response
     */
    public function show($slug, AdRepository $repo) {
        // recupere l'annonce qui correspond au slug
        $ad = $repo->findOneBySlug($slug);
        return $this->render('symprod/symprodShow.html.twig', [ 
            'ad' => $ad
        ]);
    }

}
