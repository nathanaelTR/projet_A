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
        $roles = ['ROLE_ADMIN', 'ROLE_GERANT', 'ROLE_COLLABORATEUR'];

        for ($i = 1; $i <= 120; $i++) {
            $user = new User();

            $user->setEmail("user{$i}@example.com");
            $user->setPassword($this->passwordHasher->hashPassword($user, 'password123'));

            $user->setNom("Nom{$i}");
            $user->setPrenom("Prenom{$i}");

            $user->setRoles([$roles[array_rand($roles)]]);

            $user->setGoogleAuthenticatorSecret(null);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
