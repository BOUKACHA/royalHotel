<?php

namespace App\DataFixtures;

use App\Entity\Image;
use DateTimeImmutable;
use App\DataFixtures\ChambreFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\CategorieChambreFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $image = new Image();
        $image->setImageName('chambre-superieur.jpg');
        $image->setChambre($this->getReference(ChambreFixtures::CHAMBRE_SUPERIEUR));
        $image->setUpdatedAt(new DateTimeImmutable());
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('chambre-executive.jpg');
        $image->setUpdatedAt(new DateTimeImmutable());
        $image->setRankOrder(1);
        $image->setChambre($this->getReference(ChambreFixtures::CHAMBRE_EXECUTIVE));
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('chambre-deluxe.jpg');
        $image->setUpdatedAt(new DateTimeImmutable());
        $image->setRankOrder(1);
        $image->setChambre($this->getReference(ChambreFixtures::CHAMBRE_DELUXE));
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('suite-junior.jpg');
        $image->setUpdatedAt(new DateTimeImmutable());
        $image->setRankOrder(1);
        $image->setChambre($this->getReference(ChambreFixtures::SUITE_JUNIOR));
        $manager->persist($image);
        
        $manager->flush();
    }
    public function getDependencies():array
    {
        return[
            ChambreFixtures::class
        ];
    }

}
