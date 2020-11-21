<?php

namespace App\Controller;

use App\Entity\AgentCabinet;
use App\Entity\SignesVitaux;
use App\Entity\User;
use ContainerXyn3HON\getAgentRepositoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CabinetController extends AbstractController
{
    /**
     * isGranted("ROLE_CABINET")
     * @Route("/cabinet", name="cabinet")
     */
    public function index(): Response
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($this->getUser());
        $cabinet = $this->getDoctrine()->getRepository(AgentCabinet::class)->find($user->getAgent());
        $agent_cabinet = $this->getDoctrine()->getRepository(AgentCabinet::class)->findOneByAgent($user->getAgent());
        $signes = $this->getDoctrine()->getRepository(SignesVitaux::class)->findByCabinet($agent_cabinet->getCabinet());
        return $this->render('cabinet/index.html.twig', [
            'controller_name' => 'CabinetController',
            'agent'=>$user->getAgent(),
            'cabinet'=>$agent_cabinet->getCabinet()->getDesignation(),
            'signes'=>$signes
        ]);
    }
}
