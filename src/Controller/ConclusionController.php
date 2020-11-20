<?php

namespace App\Controller;

use App\Entity\Conclusion;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConclusionController extends AbstractController
{
    /**
     * @Route("/conclusion", name="conclusion")
     */
    public function index(): Response
    {
        return $this->render('conclusion/index.html.twig', [
            'controller_name' => 'ConclusionController',
        ]);
    }

    /**
     * @Route("/edit_conclusion", name="edit_conclusion")
     */
    public function edit_conclusion(EntityManagerInterface $entityManager, Request $request)
    {
        if($request->isMethod('POST')){
            $data = $request->request->all();
            //dd($data);
            if($this->isCsrfTokenValid('modif_conclusion', $data['_token'])){
                $conclusion = $this->getDoctrine()->getRepository(Conclusion::class)
                    ->find($data['id']);
                $conclusion->setDescription($data['conclusion_modif']);
                $entityManager->persist($conclusion);
                $entityManager->flush();
                return $this->redirectToRoute('consultations', array('patient' => $data['patient'], 'signes' => $data['signes']));
            }
        }
    }
}
