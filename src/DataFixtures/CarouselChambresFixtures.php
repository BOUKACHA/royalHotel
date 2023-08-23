<?php

namespace App\DataFixtures;

use App\Entity\Carousel;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CarouselChambresFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $carouselChambres = new Carousel();
        $carouselChambres->setRankNumber(1);
        $carouselChambres->setTag("home");
        $carouselChambres->setIsActive(true);
        $carouselChambres->setImageName("acceuil1.webp");
        $manager->persist($carouselChambres);

        $carousel = new Carousel();
        $carousel->setRankNumber(1);
        $carousel->setTag("home");
        $carousel->setIsActive(true);
        $carousel->setImageName("acceuil4.jpg");
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setRankNumber(1);
        $carousel->setTag("home");
        $carousel->setIsActive(true);
        $carousel->setImageName("acceuil5.jpg");
        $manager->persist($carousel);

        $manager->flush();
    }
}
