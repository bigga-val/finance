<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActeController extends AbstractController
{
    /**
     * @Route("/acte", name="acte")
     */
    public function index(): Response
    {
        return $this->render('acte/index.html.twig', [
            'controller_name' => 'ActeController',
        ]);
    }
    
}
