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
        $usersData = [
            [
                'email' => 'admin@example.com',
                'role'  => 'ROLE_ADMIN'
            ],
            [
                'email' => 'gerant1@example.com',
                'role'  => 'ROLE_GERANT'
            ],
            [
                'email' => 'gerant2@example.com',
                'role'  => 'ROLE_GERANT'
            ],
            [
                'email' => 'collab1@example.com',
                'role'  => 'ROLE_COLLABORATEUR'
            ],
            [
                'email' => 'collab2@example.com',
                'role'  => 'ROLE_COLLABORATEUR'
            ],
            [
                'email' => 'collab3@example.com',
                'role'  => 'ROLE_COLLABORATEUR'
            ],
        ];

        foreach ($usersData as $data) {
            $user = new User();
            $user->setEmail($data['email']);
            $user->setPassword($this->passwordHasher->hashPassword($user, 'password123'));
            $user->setNom("test");
            $user->setPrenom("test");
            $user->setRoles([$data['role']]);
            $user->setGoogleAuthenticatorSecret(null);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
