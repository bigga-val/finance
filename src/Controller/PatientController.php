<?php

namespace App\Controller;

use App\Form\PatientType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Patient;

class PatientController extends AbstractController
{
    /**
     * @Route("/patient", name="patient")
     */
    public function index(): Response
    {
        $patients = $this->getDoctrine()->getRepository(Patient::class)->findAll();
        
        return $this->render('patient/index.html.twig', [
            'controller_name' => 'PatientController',
            'patients' => $patients
        ]);
    }

    /**
     * @Route("/patient/new", name="new_patient")
     */
    public function new_patient(EntityManagerInterface $manager, Request $request)
    {
        $patient = new Patient();
        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $patients = $form->getData();
            $random = 0;
            if(!function_exists('random_int')){
                $random = random_int(1, 5000);
            }
            $fiche = 'M-'.$random.$form["nom"]->getData()[0].$form["postnom"]->getData()[0];
            $patient->setNumeroFiche($fiche);
            $patient->setNom($form["nom"]->getData());
            $patient->setPostnom($form["postnom"]->getData());
            $patient->setLieuNaissance($form["lieu_naissance"]->getData());
            $patient->setDateNaissance($form["date_naissance"]->getData());
            $patient->setTelephone($form["telephone"]->getData());
            $patient->setAdresse($form["adresse"]->getData());
            $patient->setGenre($form["genre"]->getData());
            $patient->setCreatedBy($this->getUser());
            $patient->setIsAbonne(false);
            $patient->setActive(true);

            $manager->persist($patients);
            $manager->flush();
            return $this->redirectToRoute('patient');
        }
        return $this->render('patient/new_patient.html.twig',[
            'form' => $form->createView(),
        ]);
    }
}
