<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encode;

    /**
     * AppFixtures constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encode = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('romaingenin@yahoo.com');
        $user->setRoles(['ROLE_ADMIN']);
        $encodedPwd = $this->encode->encodePassword($user, "0000");
        $user->setPassword($encodedPwd);
        $user->setFirstname("Romain");
        $user->setLastname("Genin");
        $manager->persist($user);
        $manager->flush();
    }

}
