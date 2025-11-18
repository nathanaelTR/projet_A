<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class LoginFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher) {}

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('nathanael.trt@outlook.fr');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'password123'));
        $user->setNom("test");
        $user->setPrenom("test");
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setGoogleAuthenticatorSecret(null);

        $manager->persist($user);
        $manager->flush();
    }
}
