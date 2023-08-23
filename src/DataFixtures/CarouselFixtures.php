<?php

namespace App\DataFixtures;

use App\Entity\Carousel;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CarouselFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $carousel = new Carousel();
        $carousel->setRankNumber(1);
        $carousel->setTag("home");
        $carousel->setIsActive(true);
        $carousel->setImageName("acceuil1.webp");
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setRankNumber(2);
        $carousel->setTag("home");
        $carousel->setIsActive(true);
        $carousel->setImageName("acceuil2.webp");
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setRankNumber(4);
        $carousel->setTag("home");
        $carousel->setIsActive(true);
        $carousel->setImageName("acceuil3.webp");
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setRankNumber(5);
        $carousel->setTag("home");
        $carousel->setIsActive(true);
        $carousel->setImageName("acceuil4.jpg");
        $manager->persist($carousel);


        $manager->flush();
    }
}
