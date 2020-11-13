<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnamneseController extends AbstractController
{
    /**
     * @Route("/anamnese", name="anamnese")
     */
    public function index(): Response
    {
        return $this->render('anamnese/index.html.twig', [
            'controller_name' => 'AnamneseController',
        ]);
    }
}
