<?php

namespace App\Controller;

use App\Entity\Antecedent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    /**
     * @Route("/edit_antecedents", name="edit_antecedents")
     */
    public function edit_antecedentes(EntityManagerInterface $entityManager, Request $request)
    {
        if($request->isMethod("POST")){
            $data = $request->request->all();
            //dd($data);
            if($this->isCsrfTokenValid('modif_antecedent', $data['_token'])){
                $antecedent = $this->getDoctrine()->getRepository(Antecedent::class)
                    ->find($data['id']);
                if(!$antecedent){
                    throw $this->createNotFoundException("Aucun antecedent de ce type");
                }
                $antecedent->SetMedical($data['ant_medical']);
                $antecedent->setChirurgical($data['ant_chirurgical']);
                $antecedent->setFamilial($data['ant_familial']);
                $antecedent->setColateral($data['ant_colateral']);
                $entityManager->persist($antecedent);
                $entityManager->flush();
                return $this->redirectToRoute('consultations', array('patient' => $data['patient'], 'signes' => $data['signes']));
            }
        }
    }
}
