<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Repository\Agent;
use App\Entity\Entity;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function getagent(AgentRepository $agentRepository, $id)
    {
        $agent = $agentRepository->find($id);
        return $agent;
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        // $a = $agentRepository->find(5);
        
        $user = new User();
        $user->setEmail('guichet@gmail.com');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user, 'guichet'
        ));
        $user->setRoles(['ROLE_GUICHET']);
        $manager->persist($user);

        $user2 = new User();
        $user2->setEmail('infirmiere@gmail.com');
        $user2->setPassword($this->passwordEncoder->encodePassword(
            $user2, 'infirmiere'
        ));
        $user->setRoles(['ROLE_INFIRMIERE']);
        $manager->persist($user2);

        $user3 = new User();
        $user3->setEmail('cabinet@gmail.com');
        $user3->setPassword($this->passwordEncoder->encodePassword(
            $user3, 'cabinet'
        ));
        $user3->setRoles(['ROLE_CABINET']);
        $manager->persist($user3);

        $user4 = new User();
        $user4->setEmail('labo@gmail.com');
        $user4->setPassword($this->passwordEncoder->encodePassword(
            $user4, 'labo'
        ));
        $user->setRoles(['ROLE_LABO']);
        $manager->persist($user4);

        $manager->flush();
    }
}
