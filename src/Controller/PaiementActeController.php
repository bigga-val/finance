<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaiementActeController extends AbstractController
{
    /**
     * @Route("/paiement/acte", name="paiement_acte")
     */
    public function index(): Response
    {
        return $this->render('paiement_acte/index.html.twig', [
            'controller_name' => 'PaiementActeController',
        ]);
    }
}
