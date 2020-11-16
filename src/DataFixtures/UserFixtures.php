<?php

namespace App\DataFixtures;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
 
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        
        $user->setEmail('admin@admin.fr');

        $user->setRoles(array('ROLE_ADMIN'));

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'admin'
        ));
        
        $manager->persist($user);
        $manager->flush();
    }
}
