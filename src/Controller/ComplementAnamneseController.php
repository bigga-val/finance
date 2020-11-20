<?php

namespace App\Controller;

use App\Entity\ComplementsAnamnese;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComplementAnamneseController extends AbstractController
{
    /**
     * @Route("/complement/anamnese", name="complement_anamnese")
     */
    public function index(): Response
    {
        return $this->render('complement_anamnese/index.html.twig', [
            'controller_name' => 'ComplementAnamneseController',
        ]);
    }
    /**
     * @Route("/edit_complement", name="edit_complement")
     */
    public function edit_complement(EntityManagerInterface $entityManager, Request $request)
    {
        if($request->isMethod("POST")){
            $data = $request->request->all();

            if($this->isCsrfTokenValid("modif_complement", $data['_token'])){
                $complement = $this->getDoctrine()->getRepository(ComplementsAnamnese::class)
                    ->find($data['id']);
                $complement->setDescription($data['modif_complement']);
                $entityManager->persist($complement);
                $entityManager->flush();
                return $this->redirectToRoute('consultations', array('patient' => $data['patient'], 'signes' => $data['signes']));
            }
        }
    }
}
