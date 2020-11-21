<?php

namespace App\Controller;

use App\Entity\ExamensLabo;
use App\Entity\PrescriptionLabo;
use App\Entity\SingleExamenLabo;
use App\Repository\ExamensLaboRepository;
use App\Repository\PrescriptionLaboRepository;
use App\Repository\SingleExamenLaboRepository;

use Doctrine\ORM\EntityManagerInterface;
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
        $examens = $this->getDoctrine()->getRepository(PrescriptionLabo::class)
            ->findByGroupedByConsultation();
        //dd($examens);
        return $this->render("examens_labo/index.html.twig", [
            'examens' => $examens
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
    /**
     * @Route("/examens_demandes/{consultation}", name="examens_demandes")
     */
        public function examens_demandes(int $consultation, EntityManagerInterface $entityManager, Request $request){
            $examens = $this->getDoctrine()->getRepository(PrescriptionLabo::class)
                ->findForOneConsultation($consultation);
            if($request->isMethod('POST')){
                $data = $request->request->all();
                if($this->isCsrfTokenValid('save_resultat', $data['_token'])){
                    $examen = $this->getDoctrine()->getRepository(PrescriptionLabo::class)
                        ->find($data['id_examen']);
                    $examen->setResultatExamen($data['resultat']);
                    $examen->setUpdatedAt(new \DateTime('now'));
                    $examen->setUpdatedBy($this->getUser());
                    $entityManager->persist($examen);
                    $entityManager->flush();
                }
            }

            return $this->render("examens_labo/resultat.html.twig", [
                'examens'=>$examens,
                'consultation'=>$consultation
            ]);
        }
        /**
         * isGranted("ROLE_LABO")
         * @Route("/edit_examen", name="edit_exam")
         */
        public function edit_examen(Request $request, EntityManagerInterface $entityManager)
        {
            if($request->isMethod("POST")){
                $data = $request->request->all();
                //dd($data);
                if ($this->isCsrfTokenValid('update_result', $data['_token'])){
                    $examen = $this->getDoctrine()->getRepository(PrescriptionLabo::class)
                        ->find($data['id_exam']);
                    $examen->setResultatExamen($data['result_modif']);
                    $examen->setUpdatedAt(new \DateTime('now'));
                    $entityManager->persist($examen);
                    $entityManager->flush();
                    return $this->redirectToRoute("examens_demandes",
                        array("consultation"=> $data["id_consultation"]));
                }
            }
            return $this->redirectToRoute("examens_labo");
        }
}
