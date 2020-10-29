<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\PaiementActeType;
use App\Entity\PaiementActe;
use App\Entity\Acte;
use App\Repository\ActeRepository;


class PaiementActeController extends AbstractController
{
    /**
     * @Route("/paiement/acte", name="paiement_acte", defaults={"active" : "1"})
     */
    public function index(): Response
    {
        return $this->render('paiement_acte/index.html.twig', [
            'controller_name' => 'PaiementActeController',
        ]);
    }

    /**
     * @Route("paiement/acte/new", name="new_paiement_acte")    
     */
    public function ajouter_formulaire(EntityManagerInterface $entityManager, Request $request, ActeRepository $acteRepository){
        $paiement = new PaiementActe();
        $acte = $this->getDoctrine()
            ->getRepository("App\Entity\Acte")
            ->find(1);

        $paiement->setActe($acte);
        $user = $this->getDoctrine()
            ->getRepository("App\Entity\User")
            ->find(1);
        $paiement->setUser($user);
        $patient = $this -> getDoctrine()
            ->getRepository("App\Entity\Patient")
            ->find(1);
        $paiement->setPatient($patient);

        $paiement->setDatePaiement(new \Datetime('now'));
        $entityManager->persist($paiement);
        $form = $this->createForm(PaiementActeType::class, $paiement);
        // $form->handleRequest($request);
        return $this->render('paiement_acte/index.html.twig', [
            'controller_name' => 'PaiementActeController',
            'form' => $paiement
        ]);
    }
}
