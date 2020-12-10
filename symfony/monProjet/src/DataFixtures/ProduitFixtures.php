<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProduitFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr-FR');

        for ($i=1; $i <= 5; $i++) {
            $produit = new Produit();

            $designation = $faker->word;
            $couleur = $faker->word;

            $produit->setDesignation($designation)
                    ->setPrix(mt_rand(99, 599))
                    ->setCouleur($couleur);
            
                    $manager->persist($produit);
            // $product = new Product();
            // $manager->persist($product);
        }
        $manager->flush();
    }
}
