<?php

namespace App\Controller;

use App\Entity\Anamnese;
use App\Entity\Antecedent;
use App\Entity\ComplementsAnamnese;
use App\Entity\Conclusion;
use App\Entity\ExamensLabo;
use App\Entity\ExamensPhysiques;
use App\Entity\Patient;
use App\Entity\PrescriptionLabo;
use App\Entity\SignesVitaux;
use App\Entity\SingleExamenLabo;
use App\Entity\Traitement;
use App\Repository\ParacliniqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

class ConsultationController extends AbstractController
{
    /**
     * @Route("/consultation/{patient}/{signes_vitaux}", name="consultation")
     */
    public function index(int $patient, int $signes_vitaux): Response
    {
        $examens_labo = $this->getDoctrine()->getRepository(ExamensLabo::class)->findAll();
        return $this->render('consultation/index.html.twig', [
            'controller_name' => 'ConsultationController',
            'patient'=>$patient,
            'id_signes'=>$signes_vitaux,
            'examens_labo'=>$examens_labo
        ]);
    }
    /**
     * @Route("/new_consultation", name="new_consultation")
     *
     */
    public function new_consultation(Request $request, EntityManagerInterface $entityManager)
    {
        if($request->isXmlHttpRequest()){
            $signes = $this->getDoctrine()->getRepository(SignesVitaux::class)->find($request->get('signes'));
            if(!$signes){
                throw $this->createNotFoundException("Aucun enregistrement trouvé");
            }
            $antecedent = new Antecedent();
            $antecedent->setActive(true);
            $antecedent->setSignesVitaux($signes);
            $antecedent->setChirurgical($request->get("ant_chirurgical"));
            $antecedent->setColateral($request->get("ant_colateral"));
            $antecedent->setFamilial($request->get("ant_familial"));
            $antecedent->setMedical($request->get("ant_medical"));
            $entityManager->persist($antecedent);

            $plaintes = new Anamnese();
            $plaintes->setActive(true);
            $plaintes->setConsultation($signes);
            $plaintes->setDescription($request->get('anamnese'));
            $entityManager->persist($plaintes);

            $complement = new ComplementsAnamnese();
            $complement->setActive(true);
            $complement->setConsultation($signes);
            $complement->setDescription($request->get("complement"));
            $entityManager->persist($complement);

            $physiques = new ExamensPhysiques();
            $physiques->setActive(true);
            $physiques->setConsultation($signes);
            $physiques->setTeteCou($request->get("tete_cou"));
            $physiques->setTronc($request->get("tronc"));
            $physiques->setMembres($request->get("membres"));
            $physiques->setDivers($request->get("divers"));
            $entityManager->persist($physiques);

            $conclusion = new Conclusion();
            $conclusion->setActive(true);
            $conclusion->setConsultation($signes);
            $conclusion->setDescription($request->get("conclusion"));
            $entityManager->persist($conclusion);

            $traitement = new Traitement();
            $traitement->setActive(true);
            $traitement->setConsultation($signes);
            $traitement->setDescription($request->get("traitement"));
            $entityManager->persist($traitement);

            $check = $request->get("check");

            for($i = 0; $i < count($check); $i++){
                $prescrition_labo = new PrescriptionLabo();
                $prescrition_labo->setConsultation($signes);
                $prescrition_labo->setActive(true);
                $prescrition_labo->setCreatedBy($this->getUser());
                $prescrition_labo->setCreatedAt(new \DateTime('now'));
                $prescrition_labo->setSingleExamenLabo($this->getDoctrine()->getRepository(SingleExamenLabo::class)->find($check[$i]));
                $entityManager->persist($prescrition_labo);
            }

            $entityManager->flush();
            return new JsonResponse($check);
        }else{
            return new JsonResponse("ereur");
        }
    }
    /**
     * @Route("/consultations/{patient}/{signes}", name="consultations")
     */
    public function consultations(int $patient, int $signes)
    {
        $pat = $this->getDoctrine()->getRepository(Patient::class)->find($patient);
        if(!$pat){
            throw $this->createNotFoundException("Aucun patient enregistré");
        }
        $vitaux = $this->getDoctrine()->getRepository(SignesVitaux::class)->find($signes);
        if(!$vitaux){
            throw $this->createNotFoundException("Aucun enregistrement trouvé");
        }
        //$plaintes = $this->getDoctrine()->getRepository(Anamnese::class)->findOneByConsultation($signes);
        $plaintes = $this->getDoctrine()->getRepository(Anamnese::class)->findOneBy([
           'consultation'=>$vitaux,
            'active'=>1
        ]);
        if(!$plaintes){


        }
        $complements_anamnese = $this->getDoctrine()->getRepository(ComplementsAnamnese::class)->findOneBy([
            'consultation' => $signes,
            'active' => 1
        ]);
        $antecedents = $this->getDoctrine()->getRepository(Antecedent::class)->findOneBy([
            'signes_vitaux'=> $signes,
            'active'=>1
        ]);
        $examens_physiques = $this->getDoctrine()->getRepository(ExamensPhysiques::class)->findOneBy([
            'consultation'=>$signes,
            'active'=>1
        ]);
        $conclusion = $this->getDoctrine()->getRepository(Conclusion::class)->findOneBy([
            'consultation'=>$signes,
            'active'=>1
        ]);
        $traitement = $this->getDoctrine()->getRepository(Traitement::class)->findOneBy([
            'consultation'=>$signes,
            'active'=>1
        ]);
        //$paraclinique = $this->getDoctrine()->getRepository(PrescriptionLabo::class)->findBy([
        //    'consultation'=> $signes,
        //    'active'=>1
        //]);
        $paraclinique = $this->getDoctrine()->getRepository(PrescriptionLabo::class)
            ->findByPatientByConsultation($signes, $patient);




        return $this->render("/consultation/consultations.html.twig", [
            'patient'=> $pat,
            'signes'=> $vitaux,
            'anamnese'=> $plaintes,
            'complements'=> $complements_anamnese,
            'antecedent'=> $antecedents,
            'physiques'=>$examens_physiques,
            'paracliniques'=>$paraclinique,
            'conclusion'=>$conclusion,
            'traitement'=>$traitement,
            'p'=>$patient,
            's'=>$signes
        ]);
    }
}
