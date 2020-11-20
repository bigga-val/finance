<?php

namespace App\Controller;

use App\Entity\ExamensPhysiques;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExamensPhysiquesController extends AbstractController
{
    /**
     * @Route("/examens/physiques", name="examens_physiques")
     */
    public function index(): Response
    {
        return $this->render('examens_physiques/index.html.twig', [
            'controller_name' => 'ExamensPhysiquesController',
        ]);
    }

    /**
     * @Route("/edit_exphysique", name="edit_exphysique")
     */
    public function edit_exphysique(EntityManagerInterface $entityManager, Request $request)
    {
        if($request->isMethod('POST'))
        {
            $data = $request->request->all();
            if($this->isCsrfTokenValid('modif_exphysique', $data['_token']))
            {
                $physique = $this->getDoctrine()->getRepository(ExamensPhysiques::class)
                    ->find($data['id']);
                $physique->setTeteCou($data['tete_cou']);
                $physique->setTronc($data['tronc']);
                $physique->setMembres($data['membres']);
                $physique->setDivers($data['divers']);
                $entityManager->persist($physique);
                $entityManager->flush();
                return $this->redirectToRoute('consultations', array('patient' => $data['patient'], 'signes' => $data['signes']));
            }
        }
    }
}
