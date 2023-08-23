<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements FixtureGroupInterface
{
    //-----------PROPRIETES-----------------------//
    private $encoder; // Pour le hashage du mot de passe.

    //-----------CONSTRUCTEUR---------------------//
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    //-----------METHODES-------------------------//
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail("yassinboukacha2018@hotmail.fr");
        $user->setRoles(["ROLE_USER", "ROLE_ADMIN"]);
        $user->setPassword($this->encoder->hashPassword($user, "pass"));
        $manager->persist($user);

        $user = new User();
        $user->setEmail("yassin-test@test.com");
        $user->setRoles(["ROLE_USER",]);
        $user->setPassword($this->encoder->hashPassword($user, "pass"));
        $manager->persist($user);


        $manager->flush();
    }
    public static function getGroups(): array
    {
        return ['user'];
    }
}
