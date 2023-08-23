<?php

namespace App\DataFixtures;

use App\Entity\Chambre;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\Query\Expr\Func;
use Doctrine\Persistence\ObjectManager;

class ChambreFixtures extends Fixture 
{
    //----------PROPRIETES-----------------//
    public const CHAMBRE_SUPERIEUR = "chambre-superieur";
    public const CHAMBRE_EXECUTIVE = "chambre-executive";
    public const CHAMBRE_DELUXE = "chambre-deluxe";
    public const SUITE_JUNIOR = "suite-junior";

    //----------METHODES-------------------//
        public function load(ObjectManager $manager): void
    {
        $chambre = new Chambre();
        $chambre->setNumero("01");
        $chambre->setImageName("chambre-superieur.jpg");
        $chambre->setSlug("CHAMBRE_SUPERIEUR");
        $chambre->setDescreption("A NE PAS OUBLIER");
        $chambre->setIsActive(true);
        $chambre->setUpdatedAt(new DateTimeImmutable());
        $chambre->setPrix(550);
        $chambre->setCategorieChambre($this->getReference(CategorieChambreFixtures::CHAMBRE_SUPERIUR));
        $manager->persist($chambre);
        $this->setReference(self::CHAMBRE_SUPERIEUR, $chambre);

        $chambre = new Chambre();
        $chambre->setNumero("02");
        $chambre->setImageName("chambre-executive.jpg");
        $chambre->setSlug("CHAMBRE_EXECUTIVE");
        $chambre->setDescreption("A NE PAS OUBLIER");
        $chambre->setIsActive(true);
        $chambre->setUpdatedAt(new DateTimeImmutable());
        $chambre->setPrix(550);
        $chambre->setCategorieChambre($this->getReference(CategorieChambreFixtures::CHAMBRE_EXECUTIVE));
        $manager->persist($chambre);
        $this->setReference(self::CHAMBRE_EXECUTIVE, $chambre);
        
        $chambre = new Chambre();
        $chambre->setNumero("03");
        $chambre->setImageName("chambre-deluxe.jpg");
        $chambre->setSlug("CHAMBRE_DELUXE");
        $chambre->setDescreption("A NE PAS OUBLIER");
        $chambre->setIsActive(true);
        $chambre->setUpdatedAt(new DateTimeImmutable());
        $chambre->setPrix(550);
        $chambre->setCategorieChambre($this->getReference(CategorieChambreFixtures::CHAMBRE_DELUXE));
        $manager->persist($chambre);
        $this->setReference(self::CHAMBRE_DELUXE, $chambre);

        $chambre = new Chambre();
        $chambre->setNumero("04");
        $chambre->setImageName("suite-junior.jpg");
        $chambre->setSlug("SUITE_JUNIOR");
        $chambre->setDescreption("A NE PAS OUBLIER");
        $chambre->setIsActive(true);
        $chambre->setUpdatedAt(new DateTimeImmutable());
        $chambre->setPrix(550);
        $chambre->setCategorieChambre($this->getReference(CategorieChambreFixtures::SUITE_JUNIOR));
        $manager->persist($chambre);
        $this->setReference(self::SUITE_JUNIOR, $chambre);

        $manager->flush();
    }
}
