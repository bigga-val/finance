<?php

namespace App\Controller;

use App\Entity\Acte;
use App\Entity\PaiementActe;
use App\Entity\Patient;
use App\Entity\SignesVitaux;
use App\Form\SignesVitauxType;
use App\Repository\PatientRepository;
use App\Repository\SignesVitauxRepository;
use Cassandra\Date;
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
                'cabinet'=>null

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
        $actual = new \DateTime();
        $age = date_diff($actual, $patient->getDateNaissance());
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
            $signesvitaux->setCabinet($form['cabinet']->getData());
            //$signesvitaux->setService($form['service']->getData());
            $signesvitaux->setUpdatedAt(new \DateTime('now'));
            $signesvitaux->setCreatedBy($this->getUser());
            $signesvitaux->setPatient($patient);
            $entityManager->persist($signesvitaux);
            $entityManager->flush();
            //return $this->redirectToRoute('patient');
            return $this->render('signes_vitaux/new_signes_vitaux.html.twig', [
                'patient'=>$patient,
                'signes'=>$vitaux,
                'age'=>$age->y
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
            $actual = new \DateTime();
            $age = date_diff($actual, $patient->getDateNaissance());
            return $this->render('signes_vitaux/new_signes_vitaux.html.twig',[
                'patient'=> $patient,
                'form'=> $form->createView(),
                'prelever'=>$p,
                'age'=>$age->y
            ]);
        }
        $patient = $patientRepository->find($id);
        $actual = new \DateTime();
        $age = date_diff($actual, $patient->getDateNaissance());
        return $this->render('signes_vitaux/new_signes_vitaux.html.twig',[
            'patient'=> $patient,
            'form'=> $form->createView(),
            'signes'=>$vitaux,
            'age'=>$age->y
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
        $signes->setCreatedAt(new \DateTime('now'));
        $entityManager->persist($signes);
        // paiement fiche
        $fiche = $this->getDoctrine()->getRepository(Acte::class)
            ->findActeFiche();

        $paiement = new PaiementActe();
        $paiement->setActe($fiche);
        $paiement->setUser($this->getUser());
        $paiement->setActive(true);
        $paiement->setPatient($patientRepository->find($id));
        $paiement->setDatePaiement(new \DateTime('now'));
        $entityManager->persist($paiement);

        $entityManager->flush();
        $patient = $patientRepository->find($id);
        $signes = new SignesVitaux();
        $vitaux = $this->getDoctrine()->getRepository(SignesVitaux::class)
            ->findBy([
                'active'=>true,
                'patient'=>$patient
            ],[
                'created_at'=>'DESC'
            ]);
        $actual = new \DateTime();
        $age = date_diff($actual, $patient->getDateNaissance());
        return $this->render('signes_vitaux/new_signes_vitaux.html.twig',[
            'patient'=> $patient,
            'signes'=>$vitaux,
            'age'=>$age->y
        ]);
    }


}
