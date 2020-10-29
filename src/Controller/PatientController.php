<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
}
