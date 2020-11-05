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
     * @Route("paiement/acte/new/{id}", name="new_paiement_acte")    
     */
    public function ajouter_formulaire(EntityManagerInterface $entityManager, Request $request, ActeRepository $acteRepository,int $id){
        $paiement = new PaiementActe();
        

        $acte = $acteRepository->findActeFiche();

        $paiement->setActe($acte);
        
        $user = $this->getuser();

        $paiement->setUser($user);

        $patient = $this -> getDoctrine()
            ->getRepository("App\Entity\Patient")
            ->find($id);
            
        $paiement->setPatient($patient);
        $paiement->setActive("1");
        $paiement->setDatePaiement(new \Datetime('now'));
        $entityManager->persist($paiement);
        $form = $this->createForm(PaiementActeType::class, $paiement);
        $entityManager->persist($paiement);
        //$entityManager->flush();
        // $form->handleRequest($request);
        return $this->render('paiement_acte/index.html.twig', [
            'controller_name' => 'PaiementActeController',
            'form' => $paiement
        ]);
    }
}
