<?php

namespace App\DataFixtures;

use App\Entity\Home;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class HomeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $home = new Home();
        $home->setTitre('Bienveue sur le site de Royal Hotel');
        $home->setTexte(' laissez vous guider et voyager');
        $home->setIsActive(true);
        $manager->persist($home);

        $home = new Home();
        $home->setTitre('Bienveue sur le site de RoyalHotel.');
        $home->setTexte('Vivez la periode des fetes comme jamais');
        $home->setIsActive(false);
        $manager->persist($home);

        $manager->flush();
    }
}
