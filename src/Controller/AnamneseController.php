<?php

namespace App\Controller;

use App\Entity\Anamnese;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/edit_anamnese", name="edit_anamnese")
     */
    public function edit_anamnese(EntityManagerInterface $entityManager, Request $request)
    {
        if($request->isMethod('POST')) {
            $data = $request->request->all();
            if ($this->isCsrfTokenValid('modif_anamnese', $data['_token'])) {
                $anamnese = $this->getDoctrine()->getRepository(Anamnese::class)
                    ->find($data['id']);
                $anamnese->setDescription($data['anamnese_modif']);
                $entityManager->persist($anamnese);
                $entityManager->flush();
                $this->redirectToRoute('consultations', array('patient' => $data['patient'], 'signes' => $data['signes']));
            }
            return $this->redirectToRoute('consultations', array('patient' => $data['patient'], 'signes' => $data['signes']));
        }
    }
}
