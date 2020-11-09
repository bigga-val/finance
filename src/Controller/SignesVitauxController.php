<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\SignesVitaux;
use App\Form\SignesVitauxType;
use App\Repository\PatientRepository;
use App\Repository\SignesVitauxRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SignesVitauxController extends AbstractController
{
    /**
     * @Route("/signes/vitaux", name="signes_vitaux")
     */
    public function index(): Response
    {
        $patient = new Patient();
        $patients = $this->getDoctrine()->getRepository(SignesVitaux::class)
            ->findBy([
                'active' => true,
                'service'=>null

            ],
                [
                'created_at' => 'DESC',

            ]);
        return $this->render('signes_vitaux/index.html.twig', [
            'controller_name' => 'SignesVitauxController',
            'patients' => $patients,
        ]);
    }

    /**
     * @Route("/prelever/{id}/{p?}", name="prelever")
     */
    public function prelever_signes_vitaux(int $id, ?int $p, PatientRepository $patientRepository, Request $request,
                                           EntityManagerInterface $entityManager, SignesVitauxRepository $signesVitauxRepository)
    {
        $signes = new SignesVitaux();
        $vitaux = $this->getDoctrine()->getRepository(SignesVitaux::class)
            ->findByPatient($id);
        $form = $this->createForm(SignesVitauxType::class);
        $form->handleRequest($request);

        $patient = $patientRepository->find($id);
        if($form->isSubmitted() && $form->isValid()) {
            //$form['created_at']->setData(new \DateTime('now'));
            //$signes_vitaux = $form->getData();
            //$signes_vitaux->setCreatedAt(new \DateTime('now'));
            //$signes_vitaux->setCreatedBy($this->getUser());
            //$signes_vitaux->setPatient($patientRepository->find($id));
            $signesvitaux = $signesVitauxRepository->find($p);

            if (!$signesvitaux) {
                throw $this->createNotFoundException(
                    "Aucun enregistrement de ce patient retrouvé".$p
                );
            }
            $signesvitaux->setPoids($form['poids']->getData());
            $signesvitaux->setTemperature($form['temperature']->getData());
            $signesvitaux->setTensionArterielle($form['tension_arterielle']->getData());
            $signesvitaux->setService($form['service']->getData());
            $signesvitaux->setCreatedAt(new \DateTime('now'));
            $signesvitaux->setCreatedBy($this->getUser());
            $signesvitaux->setPatient($patient);
            $entityManager->persist($signesvitaux);
            $entityManager->flush();
            //return $this->redirectToRoute('patient');
            return $this->render('signes_vitaux/new_signes_vitaux.html.twig', [
                'patient'=>$patient,
                'signes'=>$vitaux
            ]);
        }
        if(!is_null($p)){
            $signesvitaux = $signesVitauxRepository->find($p);
            if (!$signesvitaux) {
                throw $this->$this->createNotFoundException(
                    "Aucun enregistrement retrouvé"
                );
            }
            $patient = $patientRepository->find($id);
            return $this->render('signes_vitaux/new_signes_vitaux.html.twig',[
                'patient'=> $patient,
                'form'=> $form->createView(),
                'prelever'=>$p
            ]);
        }
        $patient = $patientRepository->find($id);
        return $this->render('signes_vitaux/new_signes_vitaux.html.twig',[
            'patient'=> $patient,
            'form'=> $form->createView(),
            'signes'=>$vitaux
        ]);
    }

    /**
     * @Route("/nouveaux/{id}", name="nouveaux_signes", defaults={"tension_arterielle": ""})
     */
    public function nouveaux_signes( int $id, PatientRepository $patientRepository, EntityManagerInterface $entityManager)
    {
        $signes = new SignesVitaux();
        $signes->setPatient($patientRepository->find($id));
        $signes->setActive(true);
        $signes->setCreatedBy($this->getUser());
        $entityManager->persist($signes);
        $entityManager->flush();
        $patient = $patientRepository->find($id);
        $signes = new SignesVitaux();
        $vitaux = $this->getDoctrine()->getRepository(SignesVitaux::class)
            ->findBy([
                'active'=>true
            ],[
                'created_at'=>'ASC'
            ]);
        return $this->render('signes_vitaux/new_signes_vitaux.html.twig',[
            'patient'=> $patient,
            'signes'=>$vitaux
        ]);
    }


}
