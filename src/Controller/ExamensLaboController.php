<?php

namespace App\Controller;

use App\Entity\ExamensLabo;
use App\Entity\SingleExamenLabo;
use App\Repository\ExamensLaboRepository;
use App\Repository\SingleExamenLaboRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ExamensLaboController extends AbstractController
{
    /**
     * @Route("/examens/labo", name="examens_labo")
     */
    public function index(): Response
    {
        return $this->render('examens_labo/index.html.twig', [
            'controller_name' => 'ExamensLaboController',
        ]);
    }

    /**
     * @Route("/tri_examens", name="tri_examens")
     */
    public function tri_examen(Request $request)
    {
        if($request->isXmlHttpRequest()){
            $tab = array();
            $id=$request->get("examen");
            $cmp = 0;
            //$exam = $examensLaboRepository->findOneByDesignation($request->get("examen"));

            $exam = $this->getDoctrine()->getRepository(ExamensLabo::class)->find($id);
            $examens = $this->getDoctrine()->getRepository(SingleExamenLabo::class)->findAllByExamen($id);
            foreach ($examens as $e){
                $tmp = array(
                    'id'=>$e->getId(),
                    'designation'=>$e->getDesignation(),
                    'unite_si'=>$e->getUniteSi(),
                    'unite_traditionnelle'=>$e->getUniteTraditionnelle(),
                );
                $tab[$cmp++]=$tmp;
            }
            return new JsonResponse($tab);
        }

    }
}
