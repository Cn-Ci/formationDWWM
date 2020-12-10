<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use Faker\Factory;
use App\Entity\Image;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class SymprodFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    
        $faker = Factory::create('fr-FR');

        for($i = 1; $i <= 5; $i++) {
            $ad = new Ad();

            $title = $faker->sentence();
                $coverImage = $faker->imageUrl(1000, 350);
                $introduction = $faker->paragraph(1);
                $content = '<p>' . join('</p><p>', $faker->paragraphs(2)) . '</p>';

                $ad->setTitle($title)
                    ->setCoverImage($coverImage)
                    ->setIntroduction($introduction)
                    ->setContent($content)
                    ->setPrice(mt_rand(49, 579))
                    ->setnbColis(mt_rand(1, 4));

            for($j =1; $j <= mt_rand(2,5); $j++) {
                $image = new Image();

                $image->setUrl($faker->imageUrl())
                    ->setCaption($faker->sentence())
                    ->setAd($ad);

                $manager->persist($image);
            }
              
            // $product = new Product();
            $manager->persist($ad);
        }
        $manager->flush();
    }
}
