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
        
        $user->setEmail('val@gmail.com');
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user, 'valery'
        ));
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        $user2 = new User();
        
        $user2->setEmail('bigga@gmail.com');
        $user2->setPassword($this->passwordEncoder->encodePassword(
            $user2, 'gabriel'
        ));
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user2);

        $manager->flush();
    }
}
