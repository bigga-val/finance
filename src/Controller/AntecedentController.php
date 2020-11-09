<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AntecedentController extends AbstractController
{
    /**
     * @Route("/antecedent", name="antecedent")
     */
    public function index(): Response
    {
        return $this->render('antecedent/index.html.twig', [
            'controller_name' => 'AntecedentController',
        ]);
    }
}
