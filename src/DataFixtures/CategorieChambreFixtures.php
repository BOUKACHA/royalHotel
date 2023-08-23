<?php

namespace App\DataFixtures;

use App\Entity\CategorieChambre;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieChambreFixtures extends Fixture
{
    public const CHAMBRE_SUPERIUR = "chambre superieur";
    public const CHAMBRE_EXECUTIVE = "chambre executive";
    public const CHAMBRE_DELUXE = "chambre deluxe";
    public const SUITE_JUNIOR = "Suite junior";
    public function load(ObjectManager $manager): void
    {
        $categorieChambre = new CategorieChambre();
        $categorieChambre->setNom("Chambre Supérieur ");
        $categorieChambre->setSlug("chambre-superieur");
        $categorieChambre->setDescription("A NE PAS OUBLIER.");
        $categorieChambre->setImageName("chambre-supeieur.webp");
        $categorieChambre->setUpdatedAt(new DateTimeImmutable());
        $categorieChambre->setPers("2");
        $categorieChambre->setIsActive(true);
        $manager->persist($categorieChambre);
        $manager->flush();
        // On crée une référence pour la catégorie "chambre superieur" que l'on pourra utiliser
        //  dans d'autres fixtures et la catégorie à la constante CHAMBRE_SUPERIEUR 
        $this->addReference(self::CHAMBRE_SUPERIUR, $categorieChambre);

        $categorieChambre = new CategorieChambre();
        $categorieChambre->setNom("Chambre executive ");
        $categorieChambre->setSlug("chambre-executive");
        $categorieChambre->setDescription("A NE PAS OUBLIER.");
        $categorieChambre->setImageName("chambre-executive.webp");
        $categorieChambre->setUpdatedAt(new DateTimeImmutable());
        $categorieChambre->setPers("2");
        $categorieChambre->setIsActive(true);
        $manager->persist($categorieChambre);
        $manager->flush();
        // On crée une référence pour la catégorie "chambre superieur" que l'on pourra utiliser
        //  dans d'autres fixtures et la catégorie à la constante CHAMBRE_SUPERIEUR 
        $this->addReference(self::CHAMBRE_EXECUTIVE, $categorieChambre);

        $categorieChambre = new CategorieChambre();
        $categorieChambre->setNom("Chambre-deluxe ");
        $categorieChambre->setSlug("chambre-deluxe");
        $categorieChambre->setDescription("A NE PAS OUBLIER.");
        $categorieChambre->setImageName("chambre-deluxe.webp");
        $categorieChambre->setUpdatedAt(new DateTimeImmutable());
        $categorieChambre->setPers("2");
        $categorieChambre->setIsActive(true);
        $manager->persist($categorieChambre);
        $manager->flush();
        // On crée une référence pour la catégorie "chambre superieur" que l'on pourra utiliser
        //  dans d'autres fixtures et la catégorie à la constante CHAMBRE_SUPERIEUR 
        $this->addReference(self::CHAMBRE_DELUXE, $categorieChambre);

        $categorieChambre = new CategorieChambre();
        $categorieChambre->setNom("suite-junior ");
        $categorieChambre->setSlug("suite-junior");
        $categorieChambre->setDescription("A NE PAS OUBLIER.");
        $categorieChambre->setImageName("suite-junior.webp");
        $categorieChambre->setUpdatedAt(new DateTimeImmutable());
        $categorieChambre->setPers("4");
        $categorieChambre->setIsActive(true);
        $manager->persist($categorieChambre);
        $manager->flush();
        // On crée une référence pour la catégorie "chambre superieur" que l'on pourra utiliser
        //  dans d'autres fixtures et la catégorie à la constante CHAMBRE_SUPERIEUR 
        $this->addReference(self::SUITE_JUNIOR, $categorieChambre);
    }


}
