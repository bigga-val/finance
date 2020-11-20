<?php

namespace App\Controller;

use App\Entity\Traitement;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TraitementController extends AbstractController
{
    /**
     * @Route("/traitement", name="traitement")
     */
    public function index(): Response
    {
        return $this->render('traitement/index.html.twig', [
            'controller_name' => 'TraitementController',
        ]);
    }

    /**
     * @Route("/edit_traitement", name="edit_traitement")
     */
    public function edit_traitement(EntityManagerInterface $entityManager, Request $request)
    {
        if($request->isMethod('POST')){
            $data = $request->request->all();
            //dd($data);
            if($this->isCsrfTokenValid('modif_traitement', $data['_token'])){
                $traitement = $this->getDoctrine()->getRepository(Traitement::class)
                    ->find($data['id']);
                $traitement->setDescription($data['traitement_modif']);
                $entityManager->persist($traitement);
                $entityManager->flush();
                return $this->redirectToRoute('consultations', array('patient' => $data['patient'], 'signes' => $data['signes']));
            }
        }
    }
}
